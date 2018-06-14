<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Post_Comment extends Pivot
{
    protected $table = 'post__comments';
    protected $fillable =
        [
           'comment_id','post_id','user_id '
        ];
}
