<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateExpiration extends Model
{
    public $timestamps = false;

    protected $table = 'od_identitezone';

    protected $fillable = [
        'dateDebut', 'dateFin', 'identite_id', 'zone_id'
    ];
}
