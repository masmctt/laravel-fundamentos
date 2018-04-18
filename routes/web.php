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
/*
Route::get('test', function(){
	$users = new App\User;
	$users->name = 'Otro Admin';
	$users->email = 'otro@gmail,com';
	$users->password = bcrypt('1234567');
	$users->save();

	return $users;
});
*/
Route::get('roles', function(){
	//return \App\Role::all();
	return \App\Role::with('users')->get();
});

route::get('/',['as' => 'home', 'uses' => 'PagesController@home']);
route::get('home',['as' => 'home', 'uses' => 'PagesController@home']);



route::get('saludos/{nombre?}',['as' => 'saludo', 'uses' => 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");


Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');

Route::get('nav', function(){
	return view('layout');
});
