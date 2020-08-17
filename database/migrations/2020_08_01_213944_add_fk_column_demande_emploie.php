<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkColumnDemandeEmploie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_emploies', function (Blueprint $table) {
             $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('employeur_id')->references('id')->on('employeurs');
            $table->foreign('annonceE_id')->references('id')->on('annonce_emploies')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demande_emploies', function (Blueprint $table) {
             $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
             $table->dropForeign('employeurs_employeur_id_foreign');
            $table->dropForeign(['employeur_id']);
             $table->dropForeign('annonce_emploies_annonceE_id_foreign');
            $table->dropForeign(['annonceE_id']);
        });
    }
}
