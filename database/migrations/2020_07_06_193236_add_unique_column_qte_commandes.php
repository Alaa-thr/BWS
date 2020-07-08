<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueColumnQteCommandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
         
        });
         DB::statement('ALTER TABLE `commandes` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`produit_id`,`client_id`,`qte`,`couleur_id`,`taille`,`type_livraison`) ');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            //
        });
    }
}
