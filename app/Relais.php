<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relais extends Model
{
    public $timestamps = false;
    
    protected $table = 'od_relais';

    protected $fillable = [
        'gache_id', 'numero', 'delaiOuverture', 'commandeManuelle',
    ];
}
