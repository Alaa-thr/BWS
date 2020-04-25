<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkPaiementVendeurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiement_vendeurs', function (Blueprint $table) {
             $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiement_vendeurs', function (Blueprint $table) {
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);
            $table->dropForeign('admins_admin_id_foreign');
            $table->dropForeign(['admin_id']);
        });
    }
}
