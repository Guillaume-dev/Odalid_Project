<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\BadgeRequest;

class Badge extends Model
{
    public $timestamps = false;

    protected $table = 'od_identite';

    protected $fillable = [
        'dateDeNaissance', 'dateDeValidite', 'email', 'prenom', 'groupe', 'nom', 'numeroIdentite', 'numerID', 'sexe', 'type'
    ];
    protected $hidden = [
        'id'
    ];

    public function verifGroupe(BadgeRequest $req){
        // verifie si un group est renseigné, si OUI, on renseigne les tables identitezone et jour pour le badge en fonction du referent du groupe
        if($req->groupe !=''){
            //dd($req->groupe);
            $referent = Badge::find($req->groupe)->first();
        }

        // ajoute automatiquement le user au groupe si type (referent) est renseigné
        if($req->type != "") {
            $groupe = $req->id;
        }
        else{
            $groupe = $req->groupe;
        }
        return $groupe;
    }

}
