<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    protected $guarded = [];
    public function admin_roles() {
        return $this->hasMany(AdminRole::class);
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($role) {
           $role->admin_roles()->delete();
        });
    }
    //
}
