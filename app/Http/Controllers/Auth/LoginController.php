<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use App\SocialProvider;


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
    protected $redirectTo = '/acceso';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try{
            $userinfo = Socialite::driver('facebook')->user();
        }catch(\Exception $e){
            return redirect('/entrar');
        }

        $socialProvider = SocialProvider::where('provider_id', $userinfo->getID())->first();

        if(!$socialProvider){
            /*$user= User::firstOrCreate(
                ['name'=>$userinfo->getName()],
                ['email'=>$userinfo->getEmail()]             
            );

            $user->socialProvider()->create([
                'provider_id' => $userinfo->getId(),
                'provider' => 'facebook'
            ]);
            return redirect('/registro');*/

            return view('auth.register', ['userinfo'=>$userinfo]);
           
        }
        else{
            $user = $socialProvider->user;
            auth()->login($user);

            return redirect('/perfil');
        }
    }
}
