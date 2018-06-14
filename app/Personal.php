<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = ['optionalPic','bio'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
