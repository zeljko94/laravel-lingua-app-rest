<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vjestina extends Model
{
    public $table = "vjestine";
    protected $fillable = [
        'naziv', 'opis', 'icon'
    ];


    public function tecaj()
    {
        return $this->hasOne(Tecaj::class, 'vjestinaID');
    }
}
