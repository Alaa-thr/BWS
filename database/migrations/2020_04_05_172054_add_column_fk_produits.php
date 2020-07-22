<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
          
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('sous_categorie_id')->references('id')->on('sous_categories')->onDelete('SET NULL');     

        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);
            $table->dropForeign('sous_categories_sous_categorie_id_foreign');
            $table->dropForeign(['sous_categorie_id']);
           
        });
    }
}
