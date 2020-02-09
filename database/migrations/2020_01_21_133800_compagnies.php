<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compagnies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compagnies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('siret');
            $table->string('rib');
            $table->string('adress1');
            $table->string('adress2');
            $table->float('lat');
            $table->float('lng');
            $table->string('city_id');
            $table->text('description');

            $table->unsignedBigInteger('subcategorie_id');
            $table->foreign('subcategorie_id')->references('id')->on('subcategories');

            $table->smallInteger('state')->default(0); // 0: en attente de validation- 1: Active - -1: désactivée

            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compagnies');
        //
    }
}
