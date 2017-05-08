<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_order', function (Blueprint $table){
            # creating primary key for pivot table
            $table->increments('id');
            $table->timestamps();
            # creating ids that will be foreign keys
            $table->integer('order_id')->unsigned();
            $table->integer('account_id')->unsigned();
            # making the above ids foreign keys
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('account_order');
    }
}
