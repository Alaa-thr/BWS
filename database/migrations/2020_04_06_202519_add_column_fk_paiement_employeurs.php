<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkPaiementEmployeurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiement_employeurs', function (Blueprint $table) {
            $table->foreign('employeur_id')->references('id')->on('employeurs');
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
        Schema::table('paiement_employeurs', function (Blueprint $table) {
            $table->dropForeign('employeurs_employeur_id_foreign');
            $table->dropForeign(['employeur_id']);
            $table->dropForeign('admins_admin_id_foreign');
            $table->dropForeign(['admin_id']);
        });
    }
}
