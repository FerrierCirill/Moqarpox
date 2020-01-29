<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');

            $table->unsignedBigInteger('compagny_id');
            $table->unsignedBigInteger('activity_id');

            $table->timestamps();

            $table->foreign('compagny_id')->references('id')->on('compagnies');
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
        Schema::dropIfExists('pictures');
        //
    }
}
