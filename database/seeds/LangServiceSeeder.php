<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LangServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lang_services')->delete();
        DB::table('lang_services')->insert(array(
            0 => array(
                'lang_service_name' => 'Basic Transcription'
            ),
            1 => array(
                'lang_service_name' => 'Advanced Transcription'
            ),
            2 => array(
                'lang_service_name' => 'Premium Transcription'
            ),
            3 => array(
                'lang_service_name' => 'Optional Transcription'
            ),
            4 => array(
                'lang_service_name' => 'Translation'
            ),
            5 =>  array(
                'lang_service_name' => 'Proofreading'
            ),
            6 =>  array(
                'lang_service_name' => 'Voiceover'
            )
        ));
    }
}
