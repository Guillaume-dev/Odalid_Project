<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Zone;
use App\DateExpiration;
use App\PlageHoraire;
use Illluminate\Http\Request;
use Illuminate\Support\Collection;

class RestrictionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function badges($n) {
        $badge = Badge::where('id', $n)->first();
        $referents = Badge::where('type', '!=', NULL)->get();
        // Récupération nécessaire update et edit/read
        $zones = Zone::get();
        $id_tablezone = Zone::select('id')->get();
        $dates_expirations = DateExpiration::where('identite_id', $n)->get();

        // dates_expirations = table od_identitezone, pour retrouver les dates permises
        if (isset($dates_expirations) && $dates_expirations != null) {
            $table_jour = new Collection();

            // Pour chaque résultat, on concatène dans $plage_horaire les heures associées aux dates de permissions
            foreach ($dates_expirations as $id_identitezone) {
                $plage_horaire = PlageHoraire::where('identiteZone_id', $id_identitezone->id)->orderBy('id', 'asc')->get();
                $table_jour = $table_jour->merge($plage_horaire);
            }
            
            // Si aucune date de permission -> on envoit un résultat null
        } else {
            $dates_expirations = null;
            $table_jour = null;
        }
        return view('badgesRestriction3')->with('badge', $badge)
                                 ->with('referents', $referents)
                                 ->with('zones', $zones)
                                 ->with('dates_expirations', $dates_expirations)
                                 ->with('table_jour', $table_jour)
                                 ->with('id_tablezone', $id_tablezone);
    }
    
}