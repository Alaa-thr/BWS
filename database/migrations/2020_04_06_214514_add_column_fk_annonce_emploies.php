<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkAnnonceEmploies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annonce_emploies', function (Blueprint $table) {
            $table->foreign('employeur_id')->references('id')->on('employeurs');
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
        Schema::table('annonce_emploies', function (Blueprint $table) {
            $table->dropForeign('employeurs_employeur_id_foreign');
            $table->dropForeign(['employeur_id']);
            $table->dropForeign('sous_categories_sous_categorie_id_foreign');
            $table->dropForeign(['sous_categorie_id']);
        
        });
    }
}
