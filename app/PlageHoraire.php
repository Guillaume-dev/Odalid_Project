<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlageHoraire extends Model
{
    public $timestamps = false;

    protected $table = 'od_jour';

    protected $fillable = [
        'heureDebut', 'heureFin', 'nom', 'identiteZone_id'
    ];
}
