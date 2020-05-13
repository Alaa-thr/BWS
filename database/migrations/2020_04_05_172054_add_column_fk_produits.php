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
          
            $table->foreign('sous_categorie_id')->references('id')->on('sousCategories');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');

        });
        DB::unprepared('ALTER TABLE `produits` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`vendeur_id`,`sous_categorie_id`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign('sousCategories_sous_categorie_id_foreign');
            $table->dropForeign(['sous_categorie_id']);
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);

        });
    }
}
