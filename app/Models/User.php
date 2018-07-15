<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    function roles(){
        return $this->belongsToMany("App\Models\Role","role_user");
    }
    public function getFullName(){
        return $this->name.' '.$this->email;
    }
    public function hasRole($rolename){
        foreach ($this->roles as $role) if($rolename==$role->name) return true;
        return false;
    }
}
