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
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->smallInteger('state')->default(0); //0 : acheter | 1 : retracter | 2: Rembourser | 3: Depasser
            $table->text('text')->nullable();
            $table->string('email');
            $table->string('friend_name')->nullable();
            $table->string('friend_email')->nullable();

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('activity_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('activity_id')->references('id')->on('activities');

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
        Schema::dropIfExists('activities_orders');
    }
}
