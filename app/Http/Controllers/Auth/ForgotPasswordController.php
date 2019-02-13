<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
//use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */


    //use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForm(){
        return view('auth\passwords\email');
    }

    public function sendPasswordResetToken(Request $request){
        $user = User::where('email', $request->email)->first();
        if (!$user) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user.
        DB::table('od_password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('od_password_resets')
            ->where('email', $request->email)->first();
        $token = $tokenData->token;
        $email = $request->email; // or $email = $tokenData->email;

        $date_jour = Carbon::now();

        return redirect()->route('Accueil');

        /**
         * Send email to the email above with a link to your password reset
         * something like url('password-reset/' . $token)
         * Sending email varies according to your Laravel version. Very easy to implement
         */
    }

    /**
     * Assuming the URL looks like this
     * http://localhost/password-reset/random-string-here
     * You check if the user and the token exist and display a page
     */

    public function showPasswordResetForm($token){
        $tokenData = DB::table('od_password_resets')
            ->where('token', $token)->first();

       //si le token n'existe pas redirect accueil
        if ( !$tokenData ) return redirect()->route('Accueil');
        return view('auth\passwords\reset')->with('token', $token);
    }

    public function resetPassword(Request $request){

        $tokenData = DB::table('od_password_resets')
            ->where('token', $request->token)->first();

        //si l'email renseigner correspond a celui du token
        if($request->email == $tokenData->email) {

            $user = User::where('email', $tokenData->email)->first();
            // si l'utilisateur du token n'existe pas en base
            if (!$user) return redirect()->route('Accueil');

            $password = $request->password;
            $date_jour = Carbon::now()->timestamp;

            // on cree un nouveau carbon pour le comparer avec maintenant
            $date_demande = new \DateTime($tokenData->created_at);
            $date_demande = Carbon::instance($date_demande)->timestamp;

            // si le lien a moins de 30 min
            if (($date_jour - $date_demande) < 1800) {
                //return dd($date_jour - $date_demande);

                $user->password = Hash::make($password);
                $user->update(); //or $user->save();

                //do we log the user directly or let them login and try their password for the first time ? if yes
                //Auth::login($user);

                // If the user shouldn't reuse the token later, delete the token
                DB::table('od_password_resets')->where('email', $user->email)->delete();
                // changement ok
                return redirect()->route('Accueil');
            }
            else{
                //lien expiré
                DB::table('od_password_resets')->where('token', $request->token)->delete();
                return dd('lien expiré');
            }

            // redirection finale
        }
        return redirect()->route('Accueil');
    }
}
