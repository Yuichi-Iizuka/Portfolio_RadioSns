<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /** 
    *ログイン後の処理
    *メッセージの表示する
    *
    *
    */
    public function redirectPath()
    {
        session()->flash('flash_message','ログインしました');
        return '/program';
    }

    /** 
    *ログアウト処理
    *メッセージを表示する
    *@param \Illuminate\Http\Request  $request
    *@return \Illuminate\Http\RedirectResponse
    */
    public function loggedOut(Request $request)
    {
        session()->flash('flash_message','ログアウトしました');
        return redirect('/program');
    }
}
