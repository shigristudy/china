<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('company')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('street')->nullable();
            $table->integer('house_number')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('federal_state')->nullable();
            $table->string('country')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
