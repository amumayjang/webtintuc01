<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'description', 'cate_id', 'user_id', 'time_public', 'slug', 'imgThumb', 'hot', 'status', 'view'];

    public function cate()
    {
    	return $this->belongsTo('App\Category', 'cate_id');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'article_tags', 'article_id', 'tag_id');
    }

    public function author()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'id', 'user_id');
    }
}
