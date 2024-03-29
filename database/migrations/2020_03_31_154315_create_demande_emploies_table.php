<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeEmploiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_emploies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('employeur_id');
            $table->unsignedBigInteger('annonceE_id');           
            $table->boolean('reponse_employeur')->default(0);
            $table->string('cv_client');
            $table->boolean('demmande_envoyer')->default(0);
            $table->boolean('demmande_traiter')->default(0);
            $table->string('nom_Prenom');
            $table->string('numeroTlf');
            $table->string('email');
              
            $table->timestamps();
        });
         DB::statement("ALTER TABLE `demande_emploies` ADD UNIQUE `unique_user`(`client_id`, `annonceE_id`)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_emploies');
    }
}
