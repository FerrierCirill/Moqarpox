<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('message');
            $table->string('title');
            $table->integer('note');
            $table->boolean('validate')->default(0);

            $table->unsignedBigInteger('activiy_order_order_id');
            $table->unsignedBigInteger('activiy_order_activity_id');

            // $table->foreign('activiy_order_code')->references(['order_id','activity_id'])->on('activites_orders');
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
