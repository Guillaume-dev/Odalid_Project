<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Zone;

class Zone extends Model
{
    public $timestamps = false;
    
    protected $table = 'od_zone';

    protected $fillable = [
        'nom'
    ];
}
