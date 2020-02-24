<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RazinaNastave extends Model
{
    public $table = "razine-nastave";
    protected $fillable = [
        'naziv', 'opis'
    ];
}
