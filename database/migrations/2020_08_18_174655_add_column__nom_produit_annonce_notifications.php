<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNomProduitAnnonceNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificationes', function (Blueprint $table) {
           $table->string('nom_produit')->nullable()->after('vendeur_id');
           $table->string('nom_annonce')->nullable()->after('vendeur_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificationes', function (Blueprint $table) {
            $table->dropColumn('nom_produit');
            $table->dropColumn('nom_annonce');
        });
    }
}
