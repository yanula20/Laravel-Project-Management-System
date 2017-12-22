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

Route::get('/about', function () {

    return view('about')->with([

        'name' => 'Donny',

        'address' => '123 Main street',

        'email' => 'dmoore@codeup.com',

        'twitter' => 'seetheworld1989@twitter.com'
    ]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {

	Route::resource('comments', 'CommentsController');

	Route::resource('companies', 'CompaniesController');

	//user may be coming from a link or new w/o a company_id
	Route::get('projects/create/{company_id?}', 'ProjectsController@create');

	Route::resource('projects', 'ProjectsController');

	Route::post('projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');

	Route::resource('roles', 'RolesController');

	Route::resource('tasks', 'TasksController');

	Route::resource('users', 'UsersController');

});

















