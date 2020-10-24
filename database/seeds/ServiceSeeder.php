<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Transcription'
        ]);
        Service::create([
            'name' => 'Translation'
        ]);
        Service::create([
            'name' => 'Voiceover'
        ]);
    }
}
