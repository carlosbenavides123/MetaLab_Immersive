<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = array('optionalPic','title','textArea');
//    public function content(){
//        return $this->hasMany('App\Content');
//    }
}
