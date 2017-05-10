<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['cate_name', 'parent_id', 'slug', 'description'];
    public function parent() 
    {
    	return $this->belongsTo('App\Category', 'parent_id');
    }
    public function articles()
    {
    	return $this->hasMany('App\Article', 'cate_id');
    }
}
