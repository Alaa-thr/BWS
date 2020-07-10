<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signals', function (Blueprint $table) {
            
            $table->foreign('employeur_id')->references('id')->on('employeurs');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('SET NULL');     
            $table->foreign('annonce_emploi_id')->references('id')->on('annonce_emploies')->onDelete('SET NULL');     
        
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signals', function (Blueprint $table) {
            $table->dropForeign('employeurs_employeur_id_foreign');
            $table->dropForeign(['employeur_id']);
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);
            $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
            $table->dropForeign('produits_produit_id_foreign');
            $table->dropForeign(['produit_id']);
            $table->dropForeign('annonce_emploies_annonce_emploi_id_foreign');
            $table->dropForeign(['annonce_emploi_id']);
           
        });
    }
}
