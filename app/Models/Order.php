<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    //
    protected $table = 'orders';

    protected $guarded = [];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order_status() {
        return $this->belongsTo(OrderStatus::class);
    }

    public function order_data() {
        return $this->hasMany(OrderData::class);
    }
}
