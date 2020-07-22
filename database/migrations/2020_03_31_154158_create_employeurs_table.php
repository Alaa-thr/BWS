<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('num_tel')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('num_compte_banquiare')->unique();
            $table->string('nom_societe')->nullable();
            $table->string('image')->nullable();
            $table->integer('Nbre_signal')->default(0);
            $table->boolean('deletede')->default(0);
            $table->boolean('deleted_at')->nullable();
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
        Schema::dropIfExists('employeurs');
    }
}
