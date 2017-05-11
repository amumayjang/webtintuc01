<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;
use App\Http\Requests\SignUpRequest;
use Hash;

class LoginController extends Controller
{
    protected $articleRepository;
    protected $cateRepository;
    protected $userRepository;
    /**
     * get Model
     * @param ArticleRepositoryEloquent $articleRepository [Article Model]
    */
    public function __construct(ArticleRepositoryEloquent $articleRepository, CategoryRepositoryEloquent $cateRepository, UserRepositoryEloquent $userRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->cateRepository = $cateRepository;
        $this->userRepository = $userRepository;
    }

    public function getSignIn()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('/');
        }
        $newPost = $this->articleRepository->scopeQuery(function($query) {
            return $query->orderBy('time_public', 'desc');
        })->all();
        return view('sign-in', compact('newPost'));
    }

    public function signIn(Request $request)
    {
    	$auth = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
    	if ($auth) {
    		return redirect()->back();
    	}
    	return redirect()->back()->with(['message' => 'Đăng nhập không thành công!']);
    }

    public function getSignUp()
    {
        $newPost = $this->articleRepository->scopeQuery(function($query) {
            return $query->orderBy('time_public', 'desc');
        })->all();
        return view('sign-up', compact('newPost'));
    }

    public function signUp(SignUpRequest $request)
    {
        $this->userRepository->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 300,
            ]);
        return redirect()->route('getSignIn')->with(['message' => 'Đăng ký tài khoản thành công! Hãy tiến hành đăng nhập']);
    }

    public function logoutUser()
    {
    	Auth::guard('web')->logout();
    	return redirect()->back();
    }
}
