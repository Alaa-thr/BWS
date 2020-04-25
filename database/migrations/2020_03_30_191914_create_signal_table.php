<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('employeur_id')->nullable();
            $table->unsignedBigInteger('vendeur_id')->nullable();
            $table->unsignedBigInteger('produit_id')->nullable();
            $table->unsignedBigInteger('annonce_emploi_id')->nullable();
            $table->timestamps();
            $table->unique(['client_id', 'employeur_id']);
            $table->unique(['client_id', 'vendeur_id']);
            $table->unique(['client_id', 'produit_id']);
            $table->unique(['client_id', 'annonce_emploi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signals');
    }
}
