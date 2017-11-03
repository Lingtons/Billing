<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/shops', 'ShopController', ['except' => 'destroy']);
	Route::resource('/setting', 'SettingsController', ['except' => 'destroy']);
	Route::resource('/billing', 'BillingsController', ['except' => 'destroy']);
	Route::resource('/payments', 'PaymentController', ['except' => 'destroy']);
	Route::get('/new_bill/{shop_id}', 'BillingsController@new_bill');
	Route::get('/view_bill/{bill_id}', 'BillingsController@view_bill');
	Route::get('/download_invoice/{bill_id}', 'BillingsController@download_bill');
	Route::resource('/sendmail', 'SendMailController');
	//Route::post('/mail_invoice/{id}', 'SendMailController@mail_invoice');

	

});

Route::get('/home', 'HomeController@index')->name('home');



