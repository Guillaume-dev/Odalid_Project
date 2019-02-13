<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Zone;
use App\Porte;
use App\Salle;
use App\Gache;
use App\Lecteur;
use App\Relais;
use App\User;
use App\DateExpiration;
use App\PlageHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // Redirection vers badges
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
                $plage_horaire = PlageHoraire::where('identiteZone_id', $id_identitezone->id)->orderBy('nom', 'asc')->get();
                $table_jour = $table_jour->merge($plage_horaire);
            }
            // Si aucune date de permission -> on envoit un résultat null
        } else {
            $dates_expirations = null;
            $table_jour = null;
        }
        return view('badgesEdit')->with('badge', $badge)
                                 ->with('referents', $referents)
                                 ->with('zones', $zones)
                                 ->with('dates_expirations', $dates_expirations)
                                 ->with('table_jour', $table_jour)
                                 ->with('id_tablezone', $id_tablezone);
    }

    // Redirection vers badges NEW
    public function badgesNew() {
        //$badge = Badge::where('id', $n)->first();
        $referents = Badge::where('type', '!=', NULL)->get();
        //dd($referents);
        return view('badgesCreate')->with('referents', $referents);
    }

    // Redirection utilisateurs
    public function utilisateurs($n) {
        $user = User::where('id', $n)->first();
        return view('utilisateursEdit')->with('user', $user);
    }

    // Redirection gestion zones dans infrastructure
    public function zones($n) {
        $zone = Zone::where('id', $n)->first();
        return view('zonesEdit')->with('zone', $zone);
    }

    // Redirection gestion portes dans infrastructure
    // -> Edition porte
    public function portes($n) {
        // Sélection du nécessaire pour la boucle dans portesEdit.blade.php
        $porte = Porte::where('id', $n)->first();
        $salles = Salle::get();
        $gaches = Gache::get();
        $relais = Relais::get();
        $lecteurs = Lecteur::get();
        $relais_portes = Porte::select('relais_id', 'nom')->where('id', '!=', $n)->get();
        return view('portesEdit')->with('porte', $porte)
                                 ->with('salles', $salles)
                                 ->with('relais', $relais)
                                 ->with('gaches', $gaches)
                                 ->with('lecteurs', $lecteurs)
                                 ->with('relais_portes', $relais_portes);
    }
    // Création porte
    public function porteNew() {
        $salles = Salle::get();
        $gaches = Gache::get();
        $relais = Relais::get();
        $lecteurs = Lecteur::where('porte_id', '=', null)->get();
        $relais_portes = Porte::select('relais_id', 'nom')->get();
        return view('portesCreate')->with('salles', $salles)
                                   ->with('relais', $relais)
                                   ->with('gaches', $gaches)
                                   ->with('relais_portes', $relais_portes)
                                   ->with('lecteurs', $lecteurs);
    }

    // Redirection gestion salles dans infrastructure
    // -> Edition salle
    public function salles($n) {
        $salle = Salle::where('id', $n)->first();
        $zones = Zone::get();
        return view('sallesEdit')->with('salle', $salle)
                                 ->with('zones', $zones);
    }
    // -> Création salle
    public function salleNew() {
        $zones = Zone::get();
        return view('sallesCreate')->with('zones', $zones);
    }

    // Redirection gestion gaches dans infrastructure
    public function gaches($n) {
        $gache = Gache::where('id', $n)->first();
        return view('gachesEdit')->with('gache', $gache);
    }

    // Redirection gestion lecteurs dans infrastructure
    // -> Edition lecteur
    public function lecteurs($n) {
        $lecteur = Lecteur::where('id', $n)->first();
        $portes = Porte::get();
        $lecteur_portes = Lecteur::select('porte_id')->where('id', '!=', $n)->get();
        return view('lecteursEdit')->with('lecteur', $lecteur)
                                   ->with('portes', $portes)
                                   ->with('lecteur_portes', $lecteur_portes);
    }
    // -> Création lecteur
    public function lecteurNew() {
        $portes = Porte::get();
        return view('lecteursCreate')->with('portes', $portes);
    }
}
