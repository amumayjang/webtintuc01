<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin ()
    {
    	if (Auth::guard('web')->check()) {
    		return redirect()->route('dashboard');
    	}
    	return view('admin.login');
    }

    public function login (Request $request)
    {
    	$auth = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
    	if ($auth) {
    		return redirect()->route('dashboard');
    	}
    	return redirect()->route('get.login');
    }

    public function getLogout ()
    {
    	Auth::guard('web')->logout();
    	return redirect()->route('get.login');
    }
}
