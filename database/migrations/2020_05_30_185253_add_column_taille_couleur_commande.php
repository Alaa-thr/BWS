<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTailleCouleurCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('couleur_id')->nullable();
            $table->string('taille')->nullable();
            $table->foreign('couleur_id')->references('id')->on('colors');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });
        DB::unprepared('ALTER TABLE `commandes` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`produit_id`,`client_id`,`couleur_id`,`taille`,`type_livraison`,`qte`) ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign('colors_couleur_id_foreign');
            $table->dropForeign(['couleur_id']);
            $table->dropColumn(['taille_id']);
        });
    }
}
