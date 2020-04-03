<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public $table = "forumi";
    protected $fillable = [
        'naziv', 'kreatorID', 'sudionici'
    ];

    public function sudionici()
    {
        return $this->belongsToMany(User::class, 'forum_sudionici')->withTimestamps();
    }

    
    public function kreator()
    {
        return $this->belongsTo(User::class, 'kreatorID');
    }

    public function posts()
    {
        return $this->hasMany(ForumPost::class);
    }

}
