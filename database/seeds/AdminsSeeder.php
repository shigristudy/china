<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'username' => 'admin1',
           'email' => 'admin1@admin.com',
           'password' => bcrypt('admin')
        ]);

        Admin::create([
            'username' => 'admin2',
            'email' => 'admin2@admin.com',
            'password' => bcrypt('admin')
        ]);
        //
    }
}
