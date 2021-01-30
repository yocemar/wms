<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->nullable();
            $table->biginteger('customer_id')->nullable();
            $table->biginteger('detail_id')->nullable();  
            $table->string('number', 255)->nullable();
            $table->string('shipment', 255)->nullable();
            $table->string('type', 45)->nullable();
            $table->string('payment', 45)->nullable();
            $table->string('value', 45)->nullable();
            $table->string('invoice', 45)->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
