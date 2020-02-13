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
            $table->integer('state')->default(1);
            $table->integer('quantity')->default(1);
            $table->text('text');
            $table->string('email');
            $table->string('friend_name')->nullable();
            $table->string('friend_mail')->nullable();

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('activity_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('activity_id')->references('id')->on('activities');

            $table->timestamps();
            $table->softDeletes();
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
