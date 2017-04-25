<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Hash;
use App\Repositories\UserRepositoryEloquent;

class UsersController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryEloquent $repository){
        $this->repository = $repository;
    }

    public function getAllUser ()
    {
        $users = $this->repository->findByField('id', 3);
        echo "<pre>";
        var_dump($users);
        echo "</pre>";
    }

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

    public function edit ()
    {
        return view('admin.users.edit');
    }

}
