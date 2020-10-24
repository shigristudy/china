<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_roles';
    public function admin() {
        return $this->belongsTo('App\Admin');
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    //
}
