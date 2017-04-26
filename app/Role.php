<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id', 'role_name'];
    public function users ()
    {
    	return $this->hasMany('App/User', 'id', 'role_id');
    }
}
