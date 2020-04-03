<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumSudionik extends Model
{
    public $table = "forum_sudionici";
    protected $fillable = [
        'naziv', 'user_id', 'forum_id'
    ];
}
