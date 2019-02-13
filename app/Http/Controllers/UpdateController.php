<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Zone;
use App\Porte;
use App\Salle;
use App\Gache;
use App\Lecteur;
use App\User;
use App\DateExpiration;
use App\PlageHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Http\Requests\BadgeRequest;
use App\Http\Requests\ZoneRequest;
use App\Http\Requests\PorteRequest;
use App\Http\Requests\SalleRequest;
use App\Http\Requests\GacheRequest;
use App\Http\Requests\LecteurRequest;
use App\Http\Requests\RelaisRequest;
use App\Http\Requests\DateExpirationRequest;
use App\Http\Requests\PlageHoraireRequest;

class UpdateController extends Controller
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
    public function badges($n, BadgeRequest $req) {
        $groupe = new Badge;
        $groupe = $groupe->verifGroupe($req);
        $requete = Badge::find($n)->update(['nom' => $req->nom,
                                             'prenom' => $req->prenom,
                                             'email' => $req->email,
                                             'dateDeNaissance' => $req->dateDeNaissance,
                                             'numeroIdentite' => $req->numeroIdentite,
                                             'sexe' => $req->sexe,
                                             'type' => $req->type,
                                             'groupe' => $req->groupe,
                                             'dateDeValidite' => $req->dateDeValidite
                                            ]);
        // ajoute automatiquement le user au groupe si type (referent) est renseigné
        $requete = Badge::find($n)->update(['groupe' => $groupe]);

        // Ajout autorisation
        // Boucle sur le nombre de zone total
        for ($i = 1; $i <= (Zone::count()); $i++) {
            // Variables nécessaires pour retrouver les champs du formulaire (nom de la variable => nom du champ dans la BDD = 'dateDebut' + "_" + numero de la zone que l'on boucle = $i)
            $datedebut = 'dateDebut_' .$i;
            $datefin = 'dateFin_' .$i;
            $ligne_bdd = DateExpiration::where('zone_id', $i)
                                        ->where('identite_id', $n);
            // Si aucune entrée dans la table od_identitezone avec un zone_id = $i 
            // ET que les variables datedebut et datefin ne sont pas null
            // -> création d'une entrée dans od_identitezone
            if (!($ligne_bdd->exists()) && $req->$datedebut != null) {
                $requete2 = DateExpiration::create(['dateDebut' => $req->$datedebut,
                                                    'dateFin' => $req->$datefin,
                                                    'identite_id' => $n,
                                                    'zone_id' => $i
                                                    ]);
                // On récupère l'id de cette entrée créée
                $lastid_identitezone = DB::getPdo()->lastInsertId();
                // Et pour chaques jour de la semaine, une entrée est créée
                for ($j = 0; $j <= 6; $j++) {
                    $requete3 = PlageHoraire::create(['heureDebut' => '00:00:00',
                                                      'heureFin' => '23:59:00',
                                                      'nom' => $j,
                                                      'identiteZone_id' => $lastid_identitezone
                                                    ]);
                }
                // Sinon, si une entrée zone_id dans od_identitezone existe déjà
            } else {
                // Mise à jour des dates de permissions avec od_identitezone.zone_id = $i (car $i = id de zone dans laquelle on boucle actuellement)
                $requete4 = DateExpiration::where('zone_id', $i)
                                            ->where('identite_id', $n)
                                            ->update(['dateDebut' => $req->$datedebut,
                                                      'dateFin' => $req->$datefin
                                                    ]);
                // On récupère l'entrée que l'on vient de modifier (pour avoir l'id)
                $od_identitezone = DateExpiration::where('identite_id', $n)
                                                    ->where('zone_id', $i)
                                                    ->get();
                $od_jour_maj = new Collection();
                // On récupère tout les horaires et jours de permission associés à l'id od_identitezone que l'ont vient de mettre à jour
                foreach ($od_identitezone as $id) {
                    $recup_jour = PlageHoraire::where('identiteZone_id', $id->id)->get();
                    $od_jour_maj = $od_jour_maj->merge($recup_jour);
                }
                // Pour chaque horaires récupérés, ont les mets à jour
                foreach ($od_jour_maj as $update) {
                    // Variables nécessaires pour la mise à jour
                    // (nom de la variable => nom du champ dans la BDD = 'heureDebut' +
                    // "_" + id de l'entrée dans od_identitezone que l'on vient de modifier +
                    // "_" + nom de l'entrée dans od_jour (0 = dimanche, 1 = lundi, etc...))
                    $heuredebut = 'heureDebut_' .$update->identiteZone_id .'_' .$update->nom;
                    $heurefin = 'heureFin_' .$update->identiteZone_id .'_' .$update->nom;
                    // Mise à jour selon l'identiteZone_id qui a 7 occurences, donc on affine avec le nom, qui est unique par zone
                    $requete5 = PlageHoraire::where('identiteZone_id', $update->identiteZone_id)
                                            ->where('nom', $update->nom)
                                            ->update(['heureDebut' => $req->$heuredebut,
                                                      'heureFin' => $req->$heurefin
                                                    ]);
                }
            }
        }
        return redirect()->route('BadgesEdit', ['n' => $n]);
        
    }

    // Redirection utilisateurs
    public function utilisateurs($n, Request $req) {
        // on transforme ON du checkbox (si cochée) en 1, ou, 0 si decochée
        if($req->enabledOn == 'on') $enabled = 1;
        else $enabled = 0;

        $users = User::find($n)->update(['username' => $req->username,
                                         'email' => $req->email,
                                         'roles' => $req->roles,
                                         'expire_at' => $req->expire_at,
                                         'enabled' => $enabled
                                        ]);
        return redirect()->route('UtilisateursMenu', ['n' => $n]);
    }

    // Redirection gestion zones dans infrastructure
    public function zones($n, ZoneRequest $req) {
        $requete = Zone::find($n)->update($req->all());
        return redirect()->route('ZonesEdit', ['n' => $n]);
    }

    // Redirection gestion portes dans infrastructure
    public function portes($n, ZoneRequest $req) {
        $requete = Porte::find($n)->update($req->all());
        if (isset($req->id_lecteur)) {
            $requete2 = Lecteur::where('porte_id', $n)->update(['porte_id' => null]);
            $requete3 = Lecteur::find($req->id_lecteur)->update(['porte_id' => $n]);
        } else {
            $requete2 = Lecteur::where('porte_id', $n)->update(['porte_id' => null]);
        }
        return redirect()->route('PortesEdit', ['n' => $n]);
    }

    // Redirection gestion salles dans infrastructure
    public function salles($n, ZoneRequest $req) {
        $requete = Salle::find($n)->update($req->all());
        return redirect()->route('SallesEdit', ['n' => $n]);
    }

    // Redirection gestion gaches dans infrastructure
    public function gaches($n, ZoneRequest $req) {
        $requete = Gache::find($n)->update($req->all());
        return redirect()->route('GachesEdit', ['n' => $n]);
    }

    // Redirection gestion lecteurs dans infrastructure
    public function lecteurs($n, ZoneRequest $req) {
        $requete = Lecteur::find($n)->update($req->all());
        return redirect()->route('LecteursEdit', ['n' => $n]);
    }
}
