<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $form = ['name' => $data['name'],'email' => $data['email'],'password' => Hash::make($data['password'])];
        return $this->userRepository->createUser($form);
        
    }

    /** 
    *??????????????????????????????????????????????????????????????????
    *
    *@return \Illuminate\Http\Response
    */
    public function showProviderUserRegistrationForm(Request $request,String $provider)
    {
        $token = $request->token;

        $providerUser = Socialite::driver($provider)->userFromToken($token);

        return view('auth.social_register',[
            'provider' => $provider,
            'email' => $providerUser->getEmail(),
            'token' => $token,
        ]);
    }

    /** 
    *?????????????????????????????????
    *
    *@param  \Illuminate\Http\Request  $request
    *
    *@return \Illuminate\Http\RedirectResponse
    */

    public function registerProviderUser(Request $request,string $provider)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'token' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $token = $request->token;

        $providerUser = Socialite::driver($provider)->userFromToken($token);

        $form = ['name' => $request->name,'email' => $providerUser->getEmail(),'password' => Hash::make($request['password'])];


        $user = $this->userRepository->createUser($form);
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $providerUser->getEmail(),
        //     'password' => Hash::make($request['password']),
        // ]);

        $this->guard()->login($user,true);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());

    }

    /** 
    *??????????????????
    *??????????????????????????????
    *
    *
    */
    public function redirectPath()
    {
        session()->flash('flash_message','??????????????????????????????');
        return '/program';
    }
}
