<?php

	namespace App\Repositories\Regpanel;

	use App\Repositories\CoreRepository;
	use App\Models\Regpanel\Organization as Model;
	use App\Models\Regpanel\Organization;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Session;

	use Menu as LavMenu;
    use App\Http\Requests\PanelDepartmentUpdateRequest;
    use App\Models\Regpanel\Department;
    use App\Models\Regpanel\Stuff;

	class OrganizationRepository extends CoreRepository
	{
		public function __construct()
		{
			parent::__construct();
		}

		protected function getModelClass()
		{
			return Model::class;
		}

		/*Get Last Organization*/
		public function getLastOrganization($perpage)
		{
			$get = $this->startConditions()
				->orderBy('id','desc')
				->limit($perpage)
				->paginate($perpage);
			return $get;
		}

		/*Get All Organizations*/
		public function getAllOrganizations($perpage)
		{
			$get_all = $this->startConditions()
				->orderBy(\DB::raw('LENGTH(organizations.title)','organizations.title'))
				->limit($perpage)
				->paginate($perpage);
			return $get_all;
		}

		/*Get Organization Count*/
		public function getCountOrganizations()
		{
			$count = $this->startConditions()
				->count();
			return $count;
		}

		/*Get Organizations*/
		public function getOrganizations($q){
			$organizations = \DB::table('organizations')
				->select('id', 'title')
				->where('title','LIKE', ["%{$q}%"])
				->limit(8)
				->get();
			return $organizations;
		}

		/*Upload Single Image Ajax*/
		public function uploadImg($name, $wmax, $hmax){
			$uploaddir = 'uploads/single/';
			$ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $name));
			$uploadfile = $uploaddir . $name;
			\Session::put('single', $name);
			self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
		}


		/**Get Image for new Organization*/
		public function getImg(Organization $organization){
			clearstatcache();
			if (!empty(\Session::get('single'))){
				$name = \Session::get('single');
				$organization->img = $name;
				\Session::forget('single');
				return;
			}
			if (empty(\Session::get('single')) && !is_file(WWW.'/uploads/single/'.$organization->img)){
				$organization->img = null;
			}
			return;
		}

		/**Get All info about one Organization*/
		public function getInfoOrganization($id){
			$organization = $this->startConditions()
				->find($id);
			return $organization;
		}

		/* Turn Status = 1*/
		public function returnStatus($id){
			if (isset($id)){
				$st = \DB::update("UPDATE organizations SET status = '1' WHERE id = ?", [$id]);
				if ($st){
					return true;
				} else {
					return false;
				}
			}
		}

		/** Turn Status = 0*/
		public function deleteStatusOne($id){
			if (isset($id)){
				$st = \DB::update("UPDATE organizations SET status = '0' WHERE id = ?", [$id]);
				if ($st){
					return true;
				} else {
					return false;
				}
			}
		}

		/** Delete from DB*/
		public function deleteFromDB($id){
			if (isset($id)){
				$organization = \DB::delete('DELETE FROM organizations WHERE id = ?', [$id]);

				if ($organization) {
					return true;
				}
			}
		}
		/**Resize Images for My need*/
		public static function resize($target, $dest, $wmax, $hmax, $ext)
		{
			list($w_orig, $h_orig) = getimagesize($target);
			$ratio = $w_orig / $h_orig;

			if (($wmax / $hmax) > $ratio) {
				$wmax = $hmax * $ratio;
			} else {
				$hmax = $wmax / $ratio;
			}

			$img = "";
			//imagecreatejpeg | imagecreateformgif | imagecreatefrompng
			switch ($ext)  {
				case ("gif"):
					$img = imagecreatefromgif($target);
					break;
				case("png");
					$img = imagecreatefrompng($target);
					break;
				default:
					$img = imagecreatefromjpeg($target);
			}
			$newImg = imagecreatetruecolor($wmax, $hmax);
			if ($ext == "png") {
				imagesavealpha($newImg, true);
				$transPng = imagecolorallocatealpha($newImg, 0, 0, 0, 127);
				imagefill($newImg, 0, 0, $transPng);
			}
			imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
			switch ($ext) {
				case ("gif"):
					imagegif($newImg, $dest);
					break;
				case("png"):
					imagepng($newImg, $dest);
					break;
				default:
					imagejpeg($newImg, $dest);
			}
			imagedestroy($newImg);
		}


		/**Department build Menu**/
		public function buildMenu($arrMenu)
		{
			$mBuilder = LavMenu::make('MyNav', function ($m) use ($arrMenu){
				foreach ($arrMenu as $item){
					if ($item->parent_id == 0) {
					$m->add($item->title, $item->id)
							->id($item->id);
				} else {
					if($m->find($item->parent_id)) {
						$m->find($item->parent_id)
							->add($item->title, $item->id)
							->id($item->id);
					}
				}
			}
		});
		return $mBuilder;
		}

		public function checkChildren($id)
		{
			$children = $this->startConditions()
				->where('parent_id', $id)
				->count();
			return $children;
		}

		public function checkParentsStuffs($id) 
		{
			$parents = \DB::table('stuffs')
				->where('department_id', $id)
				->count();
			return $parents;
		}

		public function deleteDepartment($id)
		{
			$delete = $this->startConditions()
				->find($id)
				->forceDelete();
			return $delete;
		}

		public function getComboBosDepartment()
		{
			$columns = implode(',', [
				'id',
				'parent_id',
				'title',
				'CONCAT (id,". ", title) AS combo_title',
			]);

		$result = $this->startConditions()
			->selectRaw($columns)
			->toBase()
			->get();
		return  $result;
		}

		public function checkUniqueName($name, $parent_id)
		{
			$name = $this->startConditions()
				->where('title', '=', $name)
				->where('parent_id', '=', $parent_id)
				->exists();
			return $name;
		}

		/**Stuff*/
		public function getCountStuffs()
		{
			$count = $this->startConditions()
				->count();
			return $count;
		}
		/**Get All Stuffs*/
		public function getAllStuffs($perpage)
		{
			$get_all = \DB::table('stuffs')
				->select('id', 'name', 'surname', 'fathersname' )
				->orderBy(\DB::raw('LENGTH(stuffs.name)','stuffs.name'))
				->limit($perpage)
				->paginate($perpage);
			return $get_all;
		}
		/*Get Stuffs*/
		public function getStuffs(){
			$stuffs = \DB::table('stuffs')
				->select('id', 'name', 'surname', 'fathersname')
				->limit(8)
				->get();
			return $stuffs;
		}

		/** Delete from DB*/
		public function deleteFromDBStuff($id){
			if (isset($id)){
				$stuff = \DB::delete('DELETE FROM stuffs WHERE id = ?', [$id]);

				if ($stuff) {
					return true;
				}
			}
		}
	}