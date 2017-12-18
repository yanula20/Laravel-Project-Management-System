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

Route::resource('comments', 'CommentsController');

Route::resource('companies', 'CompaniesController');

Route::resource('projects', 'ProjectsController');

Route::resource('roles', 'RolesController');

Route::resource('tasks', 'TasksController');

Route::resource('users', 'UsersController');















