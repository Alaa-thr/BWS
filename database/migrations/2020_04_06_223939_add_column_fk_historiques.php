<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkHistoriques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiques', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::table('historiques', function (Blueprint $table) {
            $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
            $table->dropForeign('produits_produit_id_foreign');
            $table->dropForeign(['produit_id']);
            $table->dropForeign('annonce_emploies_annonceE_id_foreign');
            $table->dropForeign(['annonceE_id']);
        });
    }
}
