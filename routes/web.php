<?php

use Illuminate\Support\Facades\Hash;



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
/* con esto se muestran las sentencias SQL que realiza laravel
*/

DB::listen(function($query){
	//echo "<pre>{$query->sql}</pre>";
	//echo "<pre>{$query->time}</pre>";
});


Route::get('/login','Auth\LoginController@ShowLoginForm');

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');


Route::get('test', function(){
	$users = new App\User;
	$users->name = 'admin';
	$users->email = 'admin@gmail.com';
	$users->password = Hash::make('1234567'); //bcrypt('1234567');
	$users->save();

	return $users;
});

Route::get('roles', function(){
	//return \App\Role::all();
	return \App\Role::with('users')->get();
});

route::get('/',['as' => 'home', 'uses' => 'PagesController@home']);
//Route::get('/', function(){
//	print_r(app()->make('redis'));
//});

route::get('home',['as' => 'home', 'uses' => 'PagesController@home']);



route::get('saludos/{nombre?}',['as' => 'saludo', 'uses' => 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");


Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


Route::get('nav', function(){
	return view('layout');
});
