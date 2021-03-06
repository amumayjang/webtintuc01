<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['content_cmt', 'article_id', 'user_id', 'parent_id'];
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function article()
    {
    	return $this->belongsTo('App\Article', 'article_id');
    }
}
