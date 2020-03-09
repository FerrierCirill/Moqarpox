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
            $table->text('resume');     // court texte
            $table->string('description_perso')->nullable();      //court text (25)
            $table->text('information');  // texte personalisable + info form date
            $table->smallInteger('state')->default(0); // 0: en attente de validation - 1: Active | 2 : refusé | -1: désactivée
            $table->float('note')->nullable();
            $table->string('link0')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();

            $table->unsignedBigInteger('subCategory_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('subCategory_id')->references('id')->on('subcategories');
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('activities');
    }
}
