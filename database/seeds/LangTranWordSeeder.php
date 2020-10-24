<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangTranWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lang_tran_words')->delete();
        $values = array(
            0 => array('lang_id' => 1,'trans_word_price' => 1500),
            1 => array('lang_id' => 2,'trans_word_price' => 2500),
            2 => array('lang_id' => 3,'trans_word_price' => 1500),
            3 => array('lang_id' => 4,'trans_word_price' => 2000),
            4 => array('lang_id' => 5,'trans_word_price' => 2000),
            5 => array('lang_id' => 6,'trans_word_price' => 2000),
            6 => array('lang_id' => 7,'trans_word_price' => 2000),
            7 => array('lang_id' => 8,'trans_word_price' => 2500),
            8 => array('lang_id' => 9,'trans_word_price' => 2000),
            9 => array('lang_id' => 10,'trans_word_price' => 1500),
            10 => array('lang_id' => 11,'trans_word_price' => 1500),
            11 => array('lang_id' => 12,'trans_word_price' => 2000),
            12 => array('lang_id' => 13,'trans_word_price' => 2000),
            13 => array('lang_id' => 14,'trans_word_price' => 2000),
            14 => array('lang_id' => 15,'trans_word_price' => 2500),
            15 => array('lang_id' => 16,'trans_word_price' => 2500),
            16 => array('lang_id' => 17,'trans_word_price' => 2000),
            17 => array('lang_id' => 18,'trans_word_price' => 1500),
            18 => array('lang_id' => 19,'trans_word_price' => 2000),
            19 => array('lang_id' => 20,'trans_word_price' => 2500),
            20 => array('lang_id' => 21,'trans_word_price' => 2500),
            21 => array('lang_id' => 22,'trans_word_price' => 2500),
            22 => array('lang_id' => 23,'trans_word_price' => 2500),
            23 => array('lang_id' => 24,'trans_word_price' => 2500),
            24 => array('lang_id' => 25,'trans_word_price' => 2000),
            25 => array('lang_id' => 26,'trans_word_price' => 2000),
            26 => array('lang_id' => 27,'trans_word_price' => 2000),
            27 => array('lang_id' => 28,'trans_word_price' => 2000),
            28 => array('lang_id' => 29,'trans_word_price' => 2000),
            29 => array('lang_id' => 30,'trans_word_price' => 2500),
            30 => array('lang_id' => 31,'trans_word_price' => 2500),
            31 => array('lang_id' => 32,'trans_word_price' => 2500),
            32 => array('lang_id' => 33,'trans_word_price' => 2500),
            33 => array('lang_id' => 34,'trans_word_price' => 2500),
            34 => array('lang_id' => 35,'trans_word_price' => 2500),
            35 => array('lang_id' => 36,'trans_word_price' => 2500),
            36 => array('lang_id' => 37,'trans_word_price' => 2000),
            37 => array('lang_id' => 38,'trans_word_price' => 1500),
            38 => array('lang_id' => 39,'trans_word_price' => 1500),
            39 => array('lang_id' => 40,'trans_word_price' => 2500),
            40 => array('lang_id' => 41,'trans_word_price' => 2000),
            41 => array('lang_id' => 42,'trans_word_price' => 2000),
            42 => array('lang_id' => 43,'trans_word_price' => 2500),
            43 => array('lang_id' => 44,'trans_word_price' => 2000),
            44 => array('lang_id' => 45,'trans_word_price' => 1500),
            45 => array('lang_id' => 46,'trans_word_price' => 1500),
            46 => array('lang_id' => 47,'trans_word_price' => 2000),
            47 => array('lang_id' => 48,'trans_word_price' => 1500),
            48 => array('lang_id' => 49,'trans_word_price' => 2000),
            49 => array('lang_id' => 50,'trans_word_price' => 2000),
            50 => array('lang_id' => 51,'trans_word_price' => 2000),
            51 => array('lang_id' => 52,'trans_word_price' => 1500),
            52 => array('lang_id' => 53,'trans_word_price' => 2000),
            53 => array('lang_id' => 54,'trans_word_price' => 1500),
            54 => array('lang_id' => 55,'trans_word_price' => 1500),
            55 => array('lang_id' => 56,'trans_word_price' => 1500),
            56 => array('lang_id' => 57,'trans_word_price' => 2000),
            57 => array('lang_id' => 58,'trans_word_price' => 2500),
            58 => array('lang_id' => 59,'trans_word_price' => 2500),
            59 => array('lang_id' => 60,'trans_word_price' => 2500),
            60 => array('lang_id' => 61,'trans_word_price' => 2500),
            61 => array('lang_id' => 62,'trans_word_price' => 2500),
            62 => array('lang_id' => 63,'trans_word_price' => 2500),
            63 => array('lang_id' => 64,'trans_word_price' => 2500),
            64 => array('lang_id' => 65,'trans_word_price' => 2500),
            65 => array('lang_id' => 66,'trans_word_price' => 2500),
            66 => array('lang_id' => 67,'trans_word_price' => 2500),
            67 => array('lang_id' => 68,'trans_word_price' => 2000),
            68 => array('lang_id' => 69,'trans_word_price' => 2500),
            69 => array('lang_id' => 70,'trans_word_price' => 1500),
            70 => array('lang_id' => 71,'trans_word_price' => 1500),
            71 => array('lang_id' => 72,'trans_word_price' => 2000),
            72 => array('lang_id' => 73,'trans_word_price' => 2500),
            73 => array('lang_id' => 74,'trans_word_price' => 2500),
            74 => array('lang_id' => 75,'trans_word_price' => 2000)
        );
        DB::table('lang_tran_words')->insert($values);
    }
}
