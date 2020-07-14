<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkCommandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->unsignedBigInteger('couleur_id')->nullable();
            $table->string('taille')->default(0);
            $table->foreign('couleur_id')->references('id')->on('colors');


        });
        DB::unprepared('ALTER TABLE `commandes` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`produit_id`,`client_id`,`qte`,`type_livraison`,`couleur_id`,`taille`) ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);
            $table->dropForeign('produits_produit_id_foreign');
            $table->dropForeign(['produit_id']);
            $table->dropForeign('colors_couleur_id_foreign');
            $table->dropForeign(['couleur_id']);
            $table->dropColumn(['taille_id']);
        });
    }
}
