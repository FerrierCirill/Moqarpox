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
            $table->text('information');  // texte personalisable + info form date
            $table->smallInteger('state')->default(0); // 0: en attente de validation - 1: Active - -1: désactivée
            $table->float('note');

            $table->unsignedBigInteger('subCategory_id');
            $table->unsignedBigInteger('company_id');

            $table->timestamps();

            $table->foreign('subCategory_id')->references('id')->on('subCategories');
            $table->foreign('company_id')->references('id')->on('companies');
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
