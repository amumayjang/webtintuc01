<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role ()
    {
        return $this->belongsTo("App\Role", "role_id");
    }

    private function checkHasRole ($roleCheck)
    {
        return ($roleCheck == $this->role()->first()->id) ? true : null;
    }

    public function hasRole ($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->checkHasRole($role)) {
                    return true;
                }
            }
        } else {
            return $this->checkHasRole($roles);
        }
        return false;
    }

}
