<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');

Route::get('/dashboard', [
	'as' => 'dashboard',
	'uses' => 'DashboardController@index',
	'middleware' => 'auth'
]);

Route::group(['middleware' => ['auth', 'authorize']], function(){
	Route::resource('users', 'UsersController');
	Route::resource('roles', 'RolesController');
	Route::resource('permissions', 'PermissionsController');
	Route::get('/role_permission', 'RolesPermissionsController@index');
	Route::post('/role_permission', 'RolesPermissionsController@store');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('password/reset', 'Auth\PasswordController@postReset');


/* Non-Auth (Features) */

Route::get('features', function () {
    return view('non-auth.features');
});



/* File Uploads and Downloads (FileEntry) */
Route::group(['middleware' => ['auth', 'authorize']], function(){
	Route::get('upload', 'FileEntryController@index');
	
	Route::get('fileentry/get/{filename}', [
		'as' => 'getentry', 'uses' => 'FileEntryController@get']);
	Route::post('fileentry/add',[ 
	        'as' => 'addentry', 'uses' => 'FileEntryController@add']);
}); 

/* Browse */
Route::group(['middleware' => ['auth', 'authorize']], function(){
	Route::get('browse/professors', 'BrowseController@browse_by_professor');
	Route::get('browse/courses', 'BrowseController@browse_by_course');
	Route::get('browse/students', 'BrowseController@browse_by_student');
	Route::get('browse/my-outlines', 'BrowseController@browse_my_outlines');
	Route::post('browse_search_courses', 'BrowseController@search_by_course');
	Route::post('browse_search_professors', 'BrowseController@search_by_professor');	
	Route::post('browse_search_students', 'BrowseController@search_by_student');
	Route::post('browse_search_all', 'BrowseController@search_all');
	Route::get('year', 'BrowseController@year');
});


/* Who Taught What */
Route::group(['middleware' => ['auth', 'authorize']], function(){
	Route::resource('wtw', 'WhoTaughtWhatController');
	Route::get('manage-courses', 'WhoTaughtWhatController@manage_courses');
	Route::get('manage-professors', 'WhoTaughtWhatController@manage_professors');
	Route::post('add_new_course', 'WhoTaughtWhatController@store_manage_courses');
	Route::post('add_new_professor', 'WhoTaughtWhatController@store_manage_professors');
	
	
});