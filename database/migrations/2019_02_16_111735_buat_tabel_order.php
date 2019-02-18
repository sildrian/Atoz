<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order', function(Blueprint $table){
            $table->increments('id_order');
            $table->integer('id_users');
            $table->string('order_number');
            $table->string('mobile_number');
            $table->string('prepaid_balance');
            $table->string('name_produk');
            $table->integer('price');
            $table->integer('total');
            $table->string('shipping_address');
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
        //
        Schema::dropIfExists('order');
    }
}
