<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porte extends Model
{
    public $timestamps = false;
    
    protected $table = 'od_porte';

    protected $fillable = [
        'nom', 'salle_id', 'relais_id',
    ];
}
