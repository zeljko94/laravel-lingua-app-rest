<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipNastave extends Model
{
    public $table = "tipovi-nastave";
    protected $fillable = [
        'naziv', 'opis'
    ];

}
