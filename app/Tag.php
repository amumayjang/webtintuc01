<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name_tag'];
    public function articles()
    {
    	return $this->belongsToMany('App\Article', 'article_tags', 'article_id', 'tag_id');
    }
}
