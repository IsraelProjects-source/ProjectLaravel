<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use   App\User;

class UserController extends Controller
{
	/**
	*funcion para consultar los datos index()
	*traemos los datos de la clase User
	*User representa la tabla de usuarios
	*latest() nos permiste taerlos
	*get() nos permite nostrarlos
	*/
    public function index(){
    	$users = User::latest()->get();

    	return view('users.index', //users.index hare referencia a la carpeta que esta en view/users y archivo index
    		[
    			'users' => $users
    		]);
    }

    /**
	*funcion para dar de alta usuarios store()
	*usamos request para solicitud se formularios
	*create() se usa para crear el campo nuevo, se manda un arreglo
	*$request traira las llaves(nombres) de los campos de las tabla
	*back() retorna a la vista anterior
	*/
    public function store(Request $request){
    	$request->validate(                          //valida los datos antes de
    		[
    			'name' => 'required',
    			'email' => 'required|email|unique:users',
    			'password' => 'required|min:5'       //bcrypt() propio de laravel se utiliza para encriptar datos 
    		]);
    	User::create(
    		[
    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => $request->password
    		]);
    	return back();
    } 

    /**
    *funcion para eliminar usuario destroy()
    *recibe un usuario de User
    *delete() elimina el usuario
    */
    public function destroy(User $user){
    	$user->delete();
    	return back();
    }


}