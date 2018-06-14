<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = array('personId, optionalPic','title','textArea');

    public function users()
    {
        return  $this->belongsToMany('App\User','user__posts','id','user_id');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment','post__comments','post_id','comment_id');
    }

}
