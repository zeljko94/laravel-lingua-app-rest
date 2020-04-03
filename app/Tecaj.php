<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecaj extends Model
{
    public $table = "tecajevi";
    protected $fillable = [
        'naziv', 'opis', 'vjestinaID', 'predavacID', 'razinaNastaveID', 'tipNastaveID', 'sudionici'
    ];
    
    public function sudionici()
    {
        return $this->belongsToMany(User::class, 'tecaj_sudionici')->withTimestamps();
    }

    public function vjestina()
    {
        return $this->belongsTo(Vjestina::class, 'vjestinaID');
    }

    public function tipNastave()
    {
        return $this->belongsTo(TipNastave::class, 'tipNastaveID');
    }

    public function razinaNastave()
    {
        return $this->belongsTo(RazinaNastave::class, 'razinaNastaveID');
    }

    public function predavac()
    {
        return $this->belongsTo(User::class, 'predavacID');
    }
}
