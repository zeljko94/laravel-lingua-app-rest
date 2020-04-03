<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'RFID', 'telefon', 'email',  'password',
        'about', 'dodatno', 'titula', 'spol',
        'edukacija', 'adresa', 'vjestine', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tecajevi()
    {
        return $this->belongsToMany(Tecaj::class, 'tecaj_sudionici')->withTimestamps();
    }

    public function tecaj()
    {
        return $this->hasMany(Tecaj::class, 'predavacID');
    }

    // forumi u kojima je korisnik sudionik
    public function forumi()
    {
        return $this->belongsToMany(Forum::class, 'forum_sudionici')->withTimestamps();
    }

    // forumi kojima je korisnik kreator
    public function forum()
    {
        return $this->hasMany(Tecaj::class, 'kreatorID');
    }

}
