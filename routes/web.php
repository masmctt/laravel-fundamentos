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

//Route::get('login','Auth\LoginController@ShowLoginForm');
Route::get('/login','Auth\LoginController@ShowLoginForm');

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');


Route::get('test', function(){
	$users = new App\User;
	$users->name = 'admin';
	$users->email = 'admin@gmail.com';
	$users->password = bcrypt('1234567');
	$users->save();

	$users2 = new App\User;
	$users2->name = 'moderador';
	$users2->email = 'mod@gmail.com';
	$users2->password = bcrypt('1234567');
	$users2->save();

	$users3 = new App\User;
	$users3->name = 'estudiante';
	$users3->email = 'estudiante@gmail.com';
	$users3->password = bcrypt('1234567');
	$users3->save();

	return $users;
});

Route::get('roles', function(){
	//return \App\Role::all();
	return \App\Role::with('users')->get();
});

route::get('/',['as' => 'home', 'uses' => 'PagesController@home']);
route::get('home',['as' => 'home', 'uses' => 'PagesController@home']);



route::get('saludos/{nombre?}',['as' => 'saludo', 'uses' => 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");


Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


Route::get('nav', function(){
	return view('layout');
});
