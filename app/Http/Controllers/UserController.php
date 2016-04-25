<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id','ASC')->paginate(5);

    	return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {

    	return view('admin.users.create');    	
    }

    public function store(Request $request)
    {
    	$users = new User($request->all());
    	$users->password = bcrypt($request->password);  
    	$users->save();

    	flash()->success('Registro Exitoso');
    	return redirect('admin/users');
    }

    public function destroy($id_user)
    {    	
    	$user = User::find($id_user);
    	$user->delete();
    	flash()->error('Registro borrado correctamente');
    	return redirect('admin/users');
    }


    public function edit($id_user)
    {
    	$user = User::find($id_user);
    	return view('admin.users.edit')->with('user',$user);
    }


    public function update(Request $request)
    {
    	$id_user =	$request->id;
    	unset($request->id);
    	$user = User::find($id_user);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->member = $request->type;

    	$user->save();
    	flash()->success('Actualización realizada correctamente');

    	return redirect('admin/users');
    }
}
