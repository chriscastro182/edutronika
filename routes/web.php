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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
	//productos
	Route::post('productos/store', 'ProductoController@store')->name('productos.store')
		->middleware('permission:productos.create');

	Route::get('productos', 'ProductoController@index')->name('productos.index')
		->middleware('permission:productos.index');

	Route::get('productos/create', 'ProductoController@create')->name('productos.create')
		->middleware('permission:productos.create');

	Route::put('productos/{product}', 'ProductoController@update')->name('productos.update')
		->middleware('permission:productos.edit');

	Route::get('productos/{product}', 'ProductoController@show')->name('productos.show')
		->middleware('permission:productos.show');

	Route::delete('productos/{product}', 'ProductoController@destroy')->name('productos.destroy')
		->middleware('permission:productos.destroy');

	Route::get('productos/{product}/edit', 'ProductoController@edit')->name('productos.edit')
		->middleware('permission:productos.edit');

	
});
Route::get('products', 'ProductoController@indexClients')->name('productos.indexClients');

Route::get('productosByCategoria/{categoria}', 'ProductoController@indexClientsByCategory')
		->name('productos.indexClientsByCategory');

Route::get('getCategoriasByAngular', 'CategoriaController@getCategoriasByAngular')
->name('categoria.getCategoriasByAngular');

Route::get('inicio', function () {
    return view('inicio');
})->name('inicio');