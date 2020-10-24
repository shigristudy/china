<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderData extends Model
{
    //
    protected $table = 'orders_data';

    protected $guarded = [];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
