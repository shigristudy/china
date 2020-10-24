<?php

use Illuminate\Database\Seeder;
use App\Models\Lang;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('langs')->delete();
       $values = array(
           0 => array('lang' => 'Afrikaans'),
           1 => array('lang' => 'Albanian'),
           2 => array('lang' => 'Arabic'),
           3 => array('lang' => 'Armenian'),
           4 => array('lang' => 'Azerbaijani'),
           5 => array('lang' => 'Belarusian'),
           6 => array('lang' => 'Bengali'),
           7 => array('lang' => 'Bosnian'),
           8 => array('lang' => 'Bulgarian'),
           9 => array('lang' => 'Cambodian (Khmer)'),
           10 => array('lang' => 'Catalan'),
           11 => array('lang' => 'Chinese Cantonese'),
           12 => array('lang' => 'Chinese Mandarian (Taiwan)'),
           13 => array('lang' => 'Chinese Mandarian (Mainland)'),
           14 => array('lang' => 'Croatian'),
           15 => array('lang' => 'Czetch'),
           16 => array('lang' => 'Danish'),
           17 => array('lang' => 'Dari'),
           18 => array('lang' => 'Dutch'),
           19 => array('lang' => 'English Australia'),
           20 => array('lang' => 'English Canada'),
           21 => array('lang' => 'English UK'),
           22 => array('lang' => 'English USA'),
           23 => array('lang' => 'Estonian'),
           24 => array('lang' => 'Farsi'),
           25 => array('lang' => 'Filipino'),
           26 => array('lang' => 'Finnish'),
           27 => array('lang' => 'Flemish'),
           28 => array('lang' => 'French'),
           29 => array('lang' => 'French Canada'),
           30 => array('lang' => 'French Switzerland'),
           31 => array('lang' => 'French Belgium'),
           32 => array('lang' => 'German'),
           33 => array('lang' => 'German Austria'),
           34 => array('lang' => 'German Switzerland'),
           35 => array('lang' => 'Greek'),
           36 => array( 'lang' => 'Hebrew'),
           37 => array( 'lang' => 'Hindi'),
           38 => array( 'lang' => 'Hungarian'),
           39 => array( 'lang' => 'Icelandic'),
           40 => array( 'lang' => 'Indonesian'),
           41 => array( 'lang' => 'Italian'),
           42 => array( 'lang' => 'Italian Switzerland'),
           43 => array( 'lang' => 'Japanese'),
           44 => array( 'lang' => 'Kazakh'),
           45 => array( 'lang' => 'Korean'),
           46 => array( 'lang' => 'Kurdish'),
           47 => array( 'lang' => 'Latvian'),
           48 => array( 'lang' => 'Lithuanian'),
           49 => array( 'lang' => 'Macedonian'),
           50 => array( 'lang' => 'Malay'),
           51 => array( 'lang' => 'Maltese'),
           52 => array( 'lang' => 'Marathi'),
           53 => array( 'lang' => 'Mongolian'),
           54 => array( 'lang' => 'Nepali'),
           55 => array( 'lang' => 'Norwegian'),
           56 => array( 'lang' => 'Polish'),
           57 => array( 'lang' => 'Portuguese'),
           58 => array( 'lang' => 'Portuguese Brazilian'),
           59 => array( 'lang' => 'Romanian'),
           60 => array( 'lang' => 'Russian'),
           61 => array( 'lang' => 'Serbian'),
           62 => array( 'lang' => 'Slovakian'),
           63 => array( 'lang' => 'Slovenian'),
           64 => array( 'lang' => 'Spanish'),
           65 => array( 'lang' => 'Spanish Latin America'),
           66 => array( 'lang' => 'Swahili'),
           67 => array( 'lang' => 'Swedish'),
           68 => array( 'lang' => 'Tagalog'),
           69 => array( 'lang' => 'Tamil'),
           70 => array( 'lang' => 'Thai'),
           71 => array( 'lang' => 'Turkish'),
           72 => array( 'lang' => 'Ukrainian'),
           73 => array( 'lang' => 'Urdu'),
           74 => array( 'lang' => 'Vietnamese')
       );
      DB::table('langs')->insert($values);
    }
}
