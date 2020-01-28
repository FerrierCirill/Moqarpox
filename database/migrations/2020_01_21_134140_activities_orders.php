<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActivitiesOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_orders', function(Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('activity_id');
            
            $table->string('code')->unique();
            $table->binary('collect');
            $table->integer('quantity');
            $table->text('text');
            $table->string('email');

            $table->primary(['order_id','activity_id']);
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('activity_id')->references('id')->on('activities');
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
    }
}
