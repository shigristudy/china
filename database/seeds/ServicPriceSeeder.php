<?php

use Illuminate\Database\Seeder;
use App\Models\ServicePrice;

class ServicPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicePrice::create([
            'id' => 1,
            'service_id' => 1,
            'price' => 0.99,
        ]);
        ServicePrice::create([
            'id' => 2,
            'service_id' => 2,
            'price' => 2.12,
        ]);
        ServicePrice::create([
            'id' => 3,
            'service_id' => 3,
            'price' => 2.77
        ]);
        ServicePrice::create([
            'id' => 4,
            'service_id' => 4,
            'price' => 0.036
        ]);
        ServicePrice::create([
            'id' => 5,
            'service_id' => 5,
            'price' => 26
        ]);
    }
}
