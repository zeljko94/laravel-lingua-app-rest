<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TecajSudionik extends Model
{
    public $table = "tecaj_sudionici";
    protected $fillable = [
        'user_id', 'tecaj_id'
    ];
}
