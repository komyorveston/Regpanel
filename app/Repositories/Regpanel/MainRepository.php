<?php

	namespace App\Repositories\Regpanel;


	use App\Repositories\CoreRepository;
	use Illuminate\Database\Eloquent\Model;


	class MainRepository extends CoreRepository
	{
		
		protected function getModelClass()
		{
			return Model::class;
		}

		public static function getCountStuffs(){
			$stuff = \DB::table('stuffs')
				->get()
				->count();
			return $stuff;
		}

		public static function getCountDepartments(){
			$dep = \DB::table('departments')
				->get()
				->count();
			return $dep;
		}
	}