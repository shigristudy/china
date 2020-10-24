<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(SuperadminsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AdminRolesSeeder::class);
        $this->call(OrderDataSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(LangServiceSeeder::class);
        $this->call(LangTranWordSeeder::class);
        $this->call(LangPriceSeeder::class);
    }
}
