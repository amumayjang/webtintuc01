<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    protected $table = 'article_tags';
    protected $fillable = ['article_id', 'tag_id'];
}
