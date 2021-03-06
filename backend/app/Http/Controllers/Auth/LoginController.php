<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
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

    /** 
    *Googleログインの画面にリダイレクト
    *
    *
    *
    */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, string $provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        $email = $providerUser->getEmail();

        $user = $this->userRepository->getUserbyEmail($email);
        // $user = User::where('email',$providerUser->getEmail())->first();

         if($user){
             $this->guard()->login($user,true);
             return $this->sendLoginResponse($request);
         }

        return redirect()->route('register.{provider}',[
            'provider' => $provider,
            'email' => $providerUser->getEmail(),
            'token' => $providerUser->token,
        ]);
    }


}
