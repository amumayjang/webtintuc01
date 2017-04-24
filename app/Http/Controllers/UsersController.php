<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;

class UsersController extends Controller
{
    public function create ()
    {
    	$roles = Role::all();
    	return view('admin.users.add', compact('roles'));
    }

    public function store (Request $request)
    {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	if ($request->hasFile('avatar-img')) {
    		$file = $request->file('avatar-img');
    		$dir = "/public/admin/uploads/images/avatar/";
    		$fileName = str_random(5).'_'.$file->getClientOriginalName();
    		while (file_exists($dir.$fileName)) {
	    		$fileName = str_random(5).'_'.$file->getClientOriginalName();
    		};
    		$file->move($dir, $fileName);
    		$user->avatar = $fileName;
    	}
    	$user->role_id = $request->role;
    	$user->save();
    }

    public function index ()
    {
    	$users = User::all();
    	return view('admin.users.manager', compact('users'));
    }
}
