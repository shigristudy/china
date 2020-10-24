<?php

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'id' => 1,
            'status' => 'Processing ...'
        ]);
        OrderStatus::create([
            'id' => 2,
            'status' => 'Accepted'
        ]);
        OrderStatus::create([
            'id' => 3,
            'status' => 'Completed'
        ]);
        OrderStatus::create([
            'id' => 4,
            'status' => 'Denied',
        ]);
        OrderStatus::create([
            'id' => 5,
            'status' => 'Deleted'
        ]);
        OrderStatus::create([
            'id' => 6,
            'status' => 'Customer declined'
        ]);
    }
}
