<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

use App\Models\AdminRole;

class Admin extends Authenticable
{
    use Notifiable;

    protected $guarded = [];
    public $role = 'admin';

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function admin_roles() {
        return $this->hasMany(AdminRole::class);
    }
    //
}
