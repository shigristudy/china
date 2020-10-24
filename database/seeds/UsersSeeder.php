<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'user1',
            'phone_number' => '+4930901820',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'username' => 'user2',
            'phone_number' => '+4930901821',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'username' => 'user3',
            'phone_number' => '+4930901822',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'username' => 'user4',
            'phone_number' => '+4930901823',
            'password' => bcrypt('123456')
        ]);
    }
}
