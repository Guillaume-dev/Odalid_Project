<?php

namespace App\Http\Controllers;

use App\User;
use App\Badge;
use App\Zone;
use App\Porte;
use App\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function badges($n) {
       $badge = Badge::where('id', $n)->first();
        return view('badgesMenu', ['badge' => $badge]);
    }
    public function utilisateurs($n) {
       $user = User::where('id', $n)->first();
        return view('utilisateursMenu')->with('user', $user);
    }
    public function zones($n) {
        $zone = Zone::where('id', $n)->first();
        return view('zonesMenu', ['zone' => $zone]);
    }
    public function portes($n) {
        $porte = Porte::where('id', $n)->first();
        return view('portesMenu', ['porte' => $porte]);
    }
    public function salles($n) {
        $salle = Salle::where('id', $n)->first();
        return view('sallesMenu', ['salle' => $salle]);
    }
    public function gaches($n) {
        $gache = Gache::where('id', $n)->first();
        return view('gachesMenu', ['gache' => $gache]);
    }
     public function lecteurs($n) {
         $lecteur = Lecteur::where('id', $n)->first();
         return view('lecteursMenu', ['lecteur' => $lecteur]);
    }
    
    
    
}
