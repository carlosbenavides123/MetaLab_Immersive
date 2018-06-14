<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('comment');

    public function posts()
    {
        return  $this->belongsToMany('App\Post','post__comments','post_id','id');
    }
}
