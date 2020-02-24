<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ucionica extends Model
{
    public $table = "ucionice";
    protected $fillable = [
        'naziv', 'opis', 'color'
    ];

}
