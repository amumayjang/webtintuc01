<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'description', 'cate_id', 'user_id', 'time_public', 'slug', 'imgThumb', 'hot', 'status', 'view'];
}
