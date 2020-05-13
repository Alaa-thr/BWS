<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('email')->unique();
            $table->string('numTelephone')->unique();
            $table->string('Addresse');
            $table->string('Nom_boutique')->nullable();
            $table->string('Num_Compte_Banquaire')->unique();
            $table->integer('Nbre_abbon')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('vendeurs');
    }
}
