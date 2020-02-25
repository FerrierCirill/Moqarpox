<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->smallInteger('state')->default(0); // 0: client - 1: prestataire
            $table->string('civility')->nullable();
            $table->string('facebook_api_token')->nullable();
            $table->smallInteger('admin')->default(0);
            $table->string('provider')->default('provider'); // A VERIF
            $table->string('provider_id')->default(0); // A VERIF
            $table->string('name')->default('name'); // test pour l'api google/facebook
            $table->rememberToken()->nullable();

            //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
