<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_data', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('service_id');
            $table->bigInteger('lang_service_id')->nullable();
            $table->bigInteger('source_lang')->nullable();
            $table->bigInteger('target_lang')->nullable();
            $table->string('orig_name');
            $table->string('file_path');
            $table->string('file_name');
            $table->double('price')->nullable();
            $table->integer('item_cnt')->nullable();
            $table->integer('duration')->nullable();
            $table->string('uploaded_file')->nullable();
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
        Schema::dropIfExists('orders_data');
    }
}
