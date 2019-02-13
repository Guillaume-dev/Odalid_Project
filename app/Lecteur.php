<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecteur extends Model
{
    public $timestamps = false;
    
    protected $table = 'od_lecteur';

    protected $fillable = [
        'ip', 'mac', 'nom', 'porte_id',
    ];
}
