<?php

use Illuminate\Database\Seeder;

class LangPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 76; $i ++) {
            for($j = 1; $j < 9; $j ++) {
                \App\Models\LangPrice::create([
                    'lang_id' => $i,
                    'lang_service_id' => $j,
                    'price' => 0.11
                ]);
            }
        }
    }
}
