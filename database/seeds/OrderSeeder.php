<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id' => 1,
            'user_id' => 3,
            'order_status_id' => 1,
            'tax' => 10.0,
            'price' => 100,
            'service_id' => 2

        ]);
        Order::create([
            'id' => 2,
            'user_id' => 3,
            'order_status_id' => 2,
            'tax' => 15.0,
            'price' => 134,
            'service_id' => 1

        ]);
        Order::create([
            'id' => 3,
            'user_id' => 4,
            'order_status_id' => 3,
            'tax' => 10.0,
            'price' => 124,
            'service_id' => 2

        ]);
        Order::create([
            'id' => 4,
            'user_id' => 4,
            'order_status_id' => 4,
            'tax' => 10.0,
            'price' => 112,
            'service_id' => 3

        ]);

    }
}
