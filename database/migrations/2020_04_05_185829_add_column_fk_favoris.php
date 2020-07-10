<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkFavoris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favoris', function (Blueprint $table) {
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('SET NULL');     
            $table->foreign('annonce_emploi_id')->references('id')->on('annonce_emploies')->onDelete('SET NULL');     
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favoris', function (Blueprint $table) {
            $table->dropForeign('annonce_emploies_annonce_emploi_id_foreign');
            $table->dropForeign(['annonce_emploi_id']);
            $table->dropForeign('produits_produit_id_foreign');
            $table->dropForeign(['produit_id']);
            $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
        });
    }
}
