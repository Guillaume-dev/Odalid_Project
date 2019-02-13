<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Carbon;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->only('password')['password'], 'enabled' => 1])) {
            // Authentication passed...
        $date_jour = Carbon::now();
        // mise a jour du last_login lors du log
        $user = User::where('username', Auth::user()->username)->update(['last_login' => $date_jour->toDateString()]);

            return redirect()->route('Accueil');
        }
        else{
            return redirect()->away('/login');
        }
    }

    public function logout(){
        // $user = User::where('username', Auth::user()->username)->update(['uuid' => '']);
        Auth::logout();
        return redirect()->route('login');
    }
}
