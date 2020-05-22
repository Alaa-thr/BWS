<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendeur_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->string('Libellé');
            $table->double('prix');
            $table->text('description');
            $table->integer('Qte_P');
            $table->integer('Notation')->nullable();
            $table->float('poid');
            $table->boolean('produit_attende')->default(0);
            $table->boolean('deleteProduit')->default(0);
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
        Schema::dropIfExists('produits');
    }
}
