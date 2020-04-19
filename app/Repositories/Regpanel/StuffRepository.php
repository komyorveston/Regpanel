<?php

	namespace App\Repositories\Regpanel;

	use App\Repositories\CoreRepository;
	use App\Models\Regpanel\Stuff as Model;
	use App\Models\Regpanel\Stuff;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Session;
	/**
	 * 
	 */
	class StuffRepository extends CoreRepository
	{
		public function __construct()
		{
			parent::__construct();
		}

		protected function getModelClass()
		{
			return Model::class;
		}
		/*Get Last Stuffs*/
		public function getLastStuffs($perpage)
		{
			$get = $this->startConditions()
				->orderBy('id','desc')
				->limit($perpage)
				->paginate($perpage);
			return $get;
		}
		/*Get All Stuffss*/ 
		public function getAllStuffs($perpage)
		{
			$get_all = $this->startConditions()
				->join('departments', 'stuffs.department_id', '=', 'departments.id')
				->select('stuffs.*','departments.title AS dep')
				->orderBy(\DB::raw('LENGTH(stuffs.name)','stuffs.name'))
				->limit($perpage)
				->paginate($perpage);
			return $get_all;
		}
		/*Get Stuffs Count*/
		public function getCountStuffs()
		{
			$count = $this->startConditions()
				->count();
			return $count;
		}
		/*Get Stuffs*/
		public function getStuffs($q){
			$stuffs = \DB::table('stuffs')
				->select('id', 'name')
				->where('name','LIKE', ["%{$q}%"])
				->limit(8)
				->get();
			return $stuffs;
		}
		/*Upload Single Image Ajax*/
		public function uploadImg($name, $wmax, $hmax){
			$uploaddir = 'uploads/single/';
			$ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $name));
			$uploadfile = $uploaddir . $name;
			\Session::put('single', $name);
			self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
		}

		/**Get Image for new Stuff*/
		public function getImg(Stuff $stuff){
			clearstatcache();
			if (!empty(\Session::get('single'))){
				$name = \Session::get('single');
				$stuff->img = $name;
				\Session::forget('single');
				return;
			}
			if (empty(\Session::get('single')) && !is_file(WWW.'/uploads/single/'. $stuff->img)){
				$stuff->img = null;
			}
			return;
		}

		/**Get All info about one Stuff*/
		public function getInfoStuff($id){
			$stuff = $this->startConditions()
				->find($id);
			return $stuff;
		}

		/* Turn Status = 1*/
		public function returnStatus($id){
			if (isset($id)){
				$st = \DB::update("UPDATE stuffs SET status = '1' WHERE id = ?", [$id]);
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
				$st = \DB::update("UPDATE stuffs SET status = '0' WHERE id = ?", [$id]);
				if ($st){
					return true;
				} else {
					return false;
				}
			}
		}

		/**Get Organization*/
		public function getOrganization($id){
			$organization_stuffs = $this->startConditions()
				->join('organization_stuffs', 'stuffs.id', '=', 'organization_stuffs.org_id')
				->select('stuffs.name', 'organization_stuffs.org_id')
				->where('organization_stuffs.stuff_id', $id)
				->get();
			return $organization_stuffs;
		}

		/**Get Position*/
		public function getPosition($id){
			$position_stuffs = $this->startConditions()
				->join('position_stuffs', 'stuffs.id', '=', 'position_stuffs.pos_id')
				->select('stuffs.name', 'position_stuffs.pos_id')
				->where('position_stuffs.stuff_id', $id)
				->get();
			return $position_stuffs;
		}


		/**Edit Organization*/
		public function editOrganization($id, $data){
			$organization_stuffs = \DB::table('organization_stuffs')
				->select('org_id')
				->where('stuff_id', $id)
				->pluck('org_id')
				->toArray();
				$sql_part = rtrim($sql_part, ',');
				\DB::insert("insert into organization_stuffs (org_id, stuff_id) VALUES $sql_part");
				return;
			

			/**если поменяли связянные товары*/
			if (!empty($data['related_org'])) {
				$result = array_diff($organization_stuffs, $data['related_org']);
				if (!empty($result) || count($organization_stuffs) != count($data['related_org'])) {
					\DB::table('organization_stuffs')
						->where('stuff_id', $id)
						->delete();
					$sql_part = '';
					foreach ($data['related_org'] as $v) {
						$sql_part .= "($id, $v),";
					}
					$sql_part = rtrim($sql_part, ',');
					\DB::insert("insert into organization_stuffs (org_id, stuff_id) VALUES $sql_part");
				}
			}
		}

		/**Edit Position*/
		public function editPosition($id, $data){
			$position_stuffs = \DB::table('position_stuffs')
				->select('pos_id')
				->where('stuff_id', $id)
				->pluck('pos_id')
				->toArray();
				$sql_part = rtrim($sql_part, ',');
				\DB::insert("insert into position_stuffs (pos_id, stuff_id) VALUES $sql_part");
				return;
			

			/**если поменяли связянные товары*/
			if (!empty($data['related_pos'])) {
				$result = array_diff($position_stuffs, $data['related_pos']);
				if (!empty($result) || count($position_stuffs) != count($data['related_pos'])) {
					\DB::table('position_stuffs')
						->where('stuff_id', $id)
						->delete();
					$sql_part = '';
					foreach ($data['related_pos'] as $v) {
						$sql_part .= "($id, $v),";
					}
					$sql_part = rtrim($sql_part, ',');
					\DB::insert("insert into position_stuffs (pos_id, stuff_id) VALUES $sql_part");
				}
			}
		}

		/** Delete from DB*/
		public function deleteFromDB($id){
			if (isset($id)){
				$stuff = \DB::delete('DELETE FROM stuffs WHERE id = ?', [$id]);

				if ($stuff) {
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
	}