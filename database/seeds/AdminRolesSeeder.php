<?php

use Illuminate\Database\Seeder;
use App\Models\AdminRole;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminRole::create([
            'admin_id' => 1,
            'role_id' => 1
        ]);
        AdminRole::create([
            'admin_id' => 2,
            'role_id' => 1
        ]);

        AdminRole::create([
            'admin_id' => 2,
            'role_id' => 1
        ]);
        //
    }
}
