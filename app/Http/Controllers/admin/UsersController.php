<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\RoleRepositoryEloquent;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    protected $usersReposi;
    protected $rolesReposi;

    public function __construct(UserRepositoryEloquent $usersReposi, RoleRepositoryEloquent $rolesReposi){
        $this->usersReposi = $usersReposi;
        $this->rolesReposi = $rolesReposi;
    }

    public function getAllUser ()
    {
        $users = $this->usersReposi->findByField('id', 3);
        echo "<pre>";
        var_dump($users->first()->name);
        echo "</pre>";
    }

    public function index ()
    {
        $users = $this->usersReposi->all();
        return view('admin.users.manager', compact('users'));
    }

    public function create ()
    {
        $roles = $this->rolesReposi->all();
        return view('admin.users.add', compact('roles'));
    }

    public function store (CreateUserRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role_id = $request->role;
        $fileName = '';
        if ($request->hasFile('avatar-img')) {
            $fileName = files_upload('public/admin/uploads/images/avatars/', $request->file('avatar-img'));
        }
        $this->usersReposi->create(
            [
                'name' => $name, 
                'email' => $email, 
                'password' => $password, 
                'role_id' => $role_id, 
                'avatar' => $fileName
            ]);
        return redirect()->route('users.manager');
    }

    public function edit ($id)
    {
        $roles = $this->rolesReposi->all();
        $user = $this->usersReposi->find($id);
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update (UpdateUserRequest $request, $id)
    {
        $fileName = '';
        if ($request->hasFile('avatar-img')) {
            $fileName = files_upload('public/admin/uploads/images/avatars/', $request->file('avatar-img'));
        }
        $this->usersReposi->update([
                'name' => $request->name,
                'email' => $request->email, 
                'role_id' => $request->role,
                'avatar' => $fileName,
            ], $id);
        return redirect()->route('users.manager');
    }

    public function destroy ($id)
    {
        $this->usersReposi->delete($id);
        return redirect()->route('users.manager');
    }

}
