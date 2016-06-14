<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

// ReneVis: changed 'class User' used by AuthController into 'class Member'
//          see: https://laracasts.com/discuss/channels/general-discussion/change-users-table-name
class Member extends Authenticatable
{
    // ReneVis: 'members' in stead of 'users'
    protected $table = 'members';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = true;

}
