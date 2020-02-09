<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price');
            $table->text('description'); // long texte
            $table->text('resume');      // court texte
            $table->string('description_perso');      //court text (25)
            $table->text('information');
            $table->string('state');
            $table->float('note');

            $table->unsignedBigInteger('subCategory_id');
            $table->unsignedBigInteger('compagny_id');

            $table->timestamps();

            $table->foreign('subCategory_id')->references('id')->on('subCategories');
            $table->foreign('compagny_id')->references('id')->on('compagnies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        //
    }
}
