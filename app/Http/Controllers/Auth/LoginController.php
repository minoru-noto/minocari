<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User; 
use Socialite; 

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



    //googleログイン認証
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $getUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email',$getUser->email)->first();

        if($user == null) {
            $user = $this->createUserByGoogle($getUser);
        }

        \Auth::login($user,true);
        return redirect(route('item.index'));
    }

    public function createUserByGoogle($getUser)
    {
        $user = User::create([
            'name' => $getUser->name,
            'email' => $getUser->email,
            'password' => \Hash::make(uniqid()),
        ]);

        return $user;
    }
}
