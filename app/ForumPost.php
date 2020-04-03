<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    public $table = "forum_posts";
    protected $fillable = [
        'message', 'user_id', 'forum_id'
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

}
