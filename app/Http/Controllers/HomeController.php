<?php

namespace App\Http\Controllers;

use App\User;
use App\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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
    public function index()
    {
      $historiques = DB::table('od_historique')
                          ->select('od_historique.id', 'od_identite.nom as identite_nom', 'od_historique.dateEvenement', 'od_porte.nom as porte_nom', 'od_historique.etatEvenement')->orderBy('dateEvenement', 'desc')->limit(8)
                          ->join('od_identite', 'od_historique.identite_id', '=', 'od_identite.id')
                          ->join('od_lecteur', 'od_historique.lecteur_id', '=', 'od_lecteur.id')
                          ->join('od_porte', 'od_lecteur.porte_id', '=', 'od_porte.id')
                          ->join('od_salle', 'od_porte.salle_id', '=', 'od_salle.id')
                          ->get();

      return view('home', ['historiques' => $historiques]);
    }

    // Redirection vers badges
    public function badges() {
        // Requête NORMALEMENT fonctionnelle pour récupérer l'utilisateur et ses droits
        // A tester avec le bon squelette de BDD
        // Résultat attendu : "nom de l'utilisateur - prénom de l'utilisateur - date de validité - nom de zone - date début et fin de permission de zone - heure de début et fin de permission d'accès"

        // !!! Vérifier les majuscules sur la bonne BDD !!!

        $badges = Badge::select('od_identite.id','od_identite.nom', 'od_identite.prenom','od_identite.sexe','od_identite.numeroID', 'od_identite.dateDeValidite','od_identite.type', 'od_identite.email', 'od_identite.dateDeNaissance', 'od_identite.numeroIdentite')
                               ->paginate(30);


           return view('badgesHome', ['badges' => $badges]);
        // return view('utilisateursHome');
        // Ajouter cette partie dans la parenthèse pour récupérer le résultat de la requête dans la vue usersHome.blade.php: ", ['badges' => $badges]"
    }

    // Redirection utilisateurs
    public function utilisateurs() {
        $users = User::get();
        return view('utilisateursHome')->with('users', $users);
    }

    // Télécharger l'historique
    public function historiqueDownload() {
        // Récupération de l'historique complet
        $historique = DB::table('od_historique')
                                    ->select('od_historique.id', 'od_identite.nom as identite_nom', 'od_historique.dateEvenement', 'od_porte.nom as porte_nom', 'od_historique.etatEvenement')
                                    ->join('od_identite', 'od_historique.identite_id', '=', 'od_identite.id')
                                    ->join('od_lecteur', 'od_historique.lecteur_id', '=', 'od_lecteur.id')
                                    ->join('od_porte', 'od_lecteur.porte_id', '=', 'od_porte.id')
                                    ->join('od_salle', 'od_porte.salle_id', '=', 'od_salle.id')
                                    ->orderBy('od_historique.dateEvenement', 'desc')
                                    ->get();

        // Nom du fichier qui sera téléchargé
        $nom_fichier = "Historique.csv";

        // Ouverture pour écriture dans le fichier
        $download = fopen('php://memory', 'w');
        // Délimiteur entre les données
        $delimiteur = ";";
        // Définition du titre des champs
        $champs = array('Identifiant BDD', 'Nom badge', 'Date évènement', 'Nom porte', 'Etat évènement');
        // Ecriture des titres de champ dans le fichier
        fputcsv($download, $champs, $delimiteur);
        // Pour chaque entrée de la BDD historique (avec les join)
        foreach ($historique as $valeur) {
            $info_histo = array($valeur->id, $valeur->identite_nom, $valeur->dateEvenement, $valeur->porte_nom, $valeur->etatEvenement);
            // Ecriture dans le fichier .csv
            fputcsv($download, $info_histo, $delimiteur);
        }
        // Retour du curseur au début du fichier
        fseek($download, 0);
        // Définition des paramètres d'export
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' .$nom_fichier .'";');
        // Lecture de tout le fichier et dirige le résultat pour le download
        fpassthru($download);
        // Fermeture
        exit;
    }
    // Redirection vers l'historique
    public function historique(Request $req) {
        //on verifie si on a a faire a une requete ajax
        if($req->ajax()){
            $search = '%'.$req->recherche.'%';
        }
        else {
            $search = '%%';
        }
        // Requête NORMALEMENT fonctionnelle pour récupérer l'historique
        // A tester avec le bon squelette de BDD
        // Résultat attendu : "nom de la salle - nom de la porte - date dans l'historique - nom de la personne - prenom de la personne"

        // !!! Vérifier les majuscules sur la bonne BDD !!!
        $historiques = DB::table('od_historique')
                            ->select('od_historique.id', 'od_identite.nom as identite_nom', 'od_historique.dateEvenement', 'od_porte.nom as porte_nom', 'od_historique.etatEvenement')
                            ->join('od_identite', 'od_historique.identite_id', '=', 'od_identite.id')
                            ->join('od_lecteur', 'od_historique.lecteur_id', '=', 'od_lecteur.id')
                            ->join('od_porte', 'od_lecteur.porte_id', '=', 'od_porte.id')
                            ->join('od_salle', 'od_porte.salle_id', '=', 'od_salle.id')
                            ->where('od_identite.nom','like', $search)
                            ->paginate(25);
        //on verifie si on a a faire a une requete ajax
        if($req->ajax()) {
            //si ajax, retourne la vue qui met a jour le tableau des resultats + barre de pagination
            return view('historiqueLoad', ['historiques' => $historiques])->render();
        }
        else {
            //sinon on retourne toute la page
            return view('historiqueHome', ['historiques' => $historiques]); // Ajouter cette partie dans la parenthèse pour récupérer le résultat de la requête dans la vue historiqueHome.blade.php: ", ['historiques' => $historiques]"
        }
    }

    // Redirection gestion zones dans infrastructure
    public function zones() {
        $zones = DB::table('od_zone')->get();

        return view('zonesHome', ['zones' => $zones]);
    }

    // Redirection gestion portes dans infrastructure
    public function portes() {
        $portes = DB::table('od_porte')->get();

        return view('portesHome', ['portes' => $portes]);
    }

    // Redirection gestion salles dans infrastructure
    public function salles() {
        $salles = DB::table('od_salle')->get();

        return view('sallesHome', ['salles' => $salles]);
    }

    // Redirection gestion gaches dans infrastructure
    public function gaches() {
        $gaches = DB::table('od_gache')->get();

        return view('gachesHome', ['gaches' => $gaches]);
    }

    // Redirection gestion lecteurs dans infrastructure
    public function lecteurs() {
        $lecteurs = DB::table('od_lecteur')->get();

        return view('lecteursHome', ['lecteurs' => $lecteurs]);
    }
}
