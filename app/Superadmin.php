<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Superadmin extends Authenticable
{
    use Notifiable;

    protected $guarded = [];
    public $role = 'superadmin';

    protected $hidden = [
        'password', 'remember_token'
    ];
    //
}
