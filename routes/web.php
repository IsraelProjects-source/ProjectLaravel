<?php

use Illuminate\Support\Facades\Route;

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

/**Route::get('/', function () {
    return view('welcome');
    //return 'hola mundo';
});*/
/**route para la carpera rais llamando desde el controloador index*/
Route::get('/', 'UserController@index'); 
/**route para dar de alta a usuarios desde users con controlador llamado store*/
Route::post('/users', 'UserController@store')->name('user.store');
/**route para eliminar a usuarios desde users (recibe un user) con controlador llamado destroy*/
Route::delete('users/{user}', 'UserController@destroy')->name('user.destroy');




