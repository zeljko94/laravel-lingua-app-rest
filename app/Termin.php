<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    
    public $table = "termini";
    protected $fillable = [
       'title', 'pocetniDatum', 'zavrsniDatum', 'ucionica_id', 'user_id', 'tecaj_id'
    ];

    /*public function forum()
    {
        return $this->hasMany(Forum::class, 'forum_id', 'id');
    }
*/
    public function kreator()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function ucionica()
    {
        return $this->hasOne(Ucionica::class, 'id', 'ucionica_id');
    }

    public function tecaj()
    {
        return $this->hasOne(Tecaj::class, 'id', 'tecaj_id');
    }
}
