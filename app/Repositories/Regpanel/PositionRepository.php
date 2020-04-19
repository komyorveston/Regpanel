<?php

	namespace App\Repositories\Regpanel;

	use App\Repositories\CoreRepository;
	use App\Models\Regpanel\Position as Model;
	use App\Models\Regpanel\Position;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Session;
	/**
	 * 
	 */
	class PositionRepository extends CoreRepository
	{
		public function __construct()
		{
			parent::__construct();
		}

		protected function getModelClass()
		{
			return Model::class;
		}

		/*Get Last Position*/
		public function getLastPosition($perpage)
		{
			$get = $this->startConditions()
				->orderBy('id','desc')
				->limit($perpage)
				->paginate($perpage);
			return $get;
		}

		/*Get All Position*/
		public function getAllPositions($perpage)
		{
			$get_all = $this->startConditions()
				->orderBy(\DB::raw('LENGTH(positions.title)','positions.title'))
				->limit($perpage)
				->paginate($perpage);
			return $get_all;
		}

		/*Get Position Count*/
		public function getCountPositions()
		{
			$count = $this->startConditions()
				->count();
			return $count;
		}

		/*Get Position*/
		public function getPositions($q){
			$positions = \DB::table('positions')
				->select('id', 'title')
				->where('title','LIKE', ["%{$q}%"])
				->limit(8)
				->get();
			return $positions;
		}

	

		/**Get All info about one Position*/
		public function getInfoPosition($id){
			$position = $this->startConditions()
				->find($id);
			return $position;
		}

		/* Turn Status = 1*/
		public function returnStatus($id){
			if (isset($id)){
				$st = \DB::update("UPDATE positions SET status = '1' WHERE id = ?", [$id]);
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
				$st = \DB::update("UPDATE positions SET status = '0' WHERE id = ?", [$id]);
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
				$position = \DB::delete('DELETE FROM positions WHERE id = ?', [$id]);

				if ($position) {
					return true;
				}
			}
		}

	}