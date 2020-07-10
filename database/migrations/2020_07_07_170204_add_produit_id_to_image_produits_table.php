<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProduitIdToImageProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imageProduits', function (Blueprint $table) {
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');     

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imageProduits', function (Blueprint $table) {
            $table->dropForeign('produits_produit_id_foreign');
            $table->dropForeign(['produit_id']);
            
        });
    }
}
