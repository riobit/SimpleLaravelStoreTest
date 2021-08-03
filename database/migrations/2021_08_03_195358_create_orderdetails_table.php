<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('itemId');
            $table->unsignedInteger('orderId');
            $table->timestamps();
        });
        Schema::table('orderDetails', function (Blueprint $table) {
            $table->foreign('itemId')->references('id')->on('items');    
            $table->foreign('orderId')->references('id')->on('orders');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderDetails');
    }
}
