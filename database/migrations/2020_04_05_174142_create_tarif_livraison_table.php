<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_livraisons', function (Blueprint $table) {
            $table->id();       
            $table->unsignedBigInteger('ville_id');
            $table->unsignedBigInteger('vendeur_id'); 
            $table->double('prix');/*le prix de deplacemant*/
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->timestamps();
        });
        DB::unprepared('ALTER TABLE `tarif_livraisons` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`ville_id`,`vendeur_id`)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif_livraisons');
    }
}
