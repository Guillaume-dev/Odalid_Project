<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gache extends Model
{
    public $timestamps = false;
    
    protected $table = 'od_gache';

    protected $fillable = [
        'ip', 'mac', 'nom', 'type',
    ];
}
