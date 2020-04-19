<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Registration Panel Access*/
	Route::group(['middleware' => ['status', 'auth']], function(){
			$groupData = [
				'namespace' => 'Regpanel\Panel',
				'prefix' => 'admin',
			];

			/**Main Controller*/
			Route::group($groupData, function(){
			Route::resource('index', 'MainController')
				->names('regpanel.panel.index');

			/*User Controller*/
			Route::resource('users', 'UserController')
				->names('regpanel.panel.users');

			/*Departments Controller*/
			Route::match(['get','post'], '/departments/ajax-image-upload', 'DepartmentController@ajaxImage');
			Route::delete('/departments/ajax-remove-image/{filename}', 'DepartmentController@deleteImage');
			Route::get('departments/return-status/{id}', 'DepartmentController@returnStatus')
				->name('regpanel.panel.departments.returnstatus');
			Route::get('/departments/delete-status/{id}', 'DepartmentController@deleteStatus')
				->name('regpanel.panel.departments.deletestatus');
			Route::get('/departments/delete-department/{id}', 'DepartmentController@deleteDepartment')
				->name('regpanel.panel.departments.deletedepartment');
			Route::get('/departments/mydel', 'DepartmentController@mydel')
				->name('regpanel.panel.departments.mydel');
			Route::resource('departments', 'DepartmentController')
				->names('regpanel.panel.departments');

			/*User Controller*/
			Route::resource('users', 'UserController')
				->names('regpanel.panel.users');

			/*Stuff Controllers*/
			Route::match(['get','post'], '/stuffs/ajax-image-upload', 'StuffController@ajaxImage');
			Route::delete('/stuffs/ajax-remove-image/{filename}', 'StuffController@deleteImage');
			Route::get('stuffs/return-status/{id}', 'StuffController@returnStatus')
				->name('regpanel.panel.stuffs.returnstatus');
			Route::get('/stuffs/delete-status/{id}', 'StuffController@deleteStatus')
				->name('regpanel.panel.stuffs.deletestatus');
			Route::get('/stuffs/delete-stuff/{id}', 'StuffController@deleteStuff')
				->name('regpanel.panel.stuffs.deletestuff');
			Route::resource('stuffs', 'StuffController')
				->names('regpanel.panel.stuffs');

			/*Organization Controllers*/
			Route::match(['get','post'], '/organizations/ajax-image-upload', 'OrganizationController@ajaxImage');
			Route::delete('/organizations/ajax-remove-image/{filename}', 'OrganizationController@deleteImage');
			Route::get('organizations/return-status/{id}', 'OrganizationController@returnStatus')
				->name('regpanel.panel.organizations.returnstatus');
			Route::get('/organizations/delete-status/{id}', 'OrganizationController@deleteStatus')
				->name('regpanel.panel.organizations.deletestatus');
			Route::get('/organizations/delete-organization/{id}', 'OrganizationController@deleteOrganization')
				->name('regpanel.panel.organizations.deleteorganization');
			Route::resource('organizations', 'OrganizationController')
				->names('regpanel.panel.organizations');

			/*Position Controllers*/
			Route::match(['get','post'], '/positions/ajax-image-upload', 'PositionController@ajaxImage');
			Route::delete('/positions/ajax-remove-image/{filename}', 'PositionController@deleteImage');
			Route::get('positions/return-status/{id}', 'PositionController@returnStatus')
				->name('regpanel.panel.positions.returnstatus');
			Route::get('/positions/delete-status/{id}', 'PositionController@deleteStatus')
				->name('regpanel.panel.positions.deletestatus');
			Route::get('/positions/delete-position/{id}', 'PositionController@deletePosition')
				->name('regpanel.panel.positions.deleteposition');
			Route::resource('positions', 'PositionController')
				->names('regpanel.panel.positions');


	});
		});

	Route::get('user/index', 'Regpanel\User\MainController@index');

