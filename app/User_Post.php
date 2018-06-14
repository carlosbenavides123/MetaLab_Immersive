<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class User_Post extends Pivot
{
    protected $table = 'user__posts';
    protected $fillable =
        [
            'user_id', 'post_id'
        ];
}
