<?php

use Illuminate\Database\Seeder;
use App\Superadmin;

class SuperadminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Superadmin::create([
            'email' => 'dirk@admin.com',
            'username' => 'Dirk Busshart',
            'password' => bcrypt('superadmin')

        ]);

        Superadmin::create([
            'email' => 'illija@admin.com',
            'username' => 'Illija Ikac',
            'password' => bcrypt('superadmin')
        ]);
        //
    }
}
