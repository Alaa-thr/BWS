<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNomPrenomNumEmailDemandeEmploies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_emploies', function (Blueprint $table) {
             $table->string('nom_Prenom')->after('cv_client');
             $table->string('numeroTlf')->after('cv_client');
             $table->string('email')->after('cv_client');
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
            $table->dropColumn('nom_Prenom');
            $table->dropColumn('numeroTlf');
            $table->dropColumn('email');
        });
    }
}
