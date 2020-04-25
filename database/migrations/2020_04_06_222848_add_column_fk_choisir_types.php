<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkChoisirTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choisir_types', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
        });
        DB::unprepared('ALTER TABLE `choisir_types` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`client_id`,`vendeur_id`) ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choisir_types', function (Blueprint $table) {
            $table->dropForeign('vendeurs_vendeur_id_foreign');
            $table->dropForeign(['vendeur_id']);
            $table->dropForeign('clients_client_id_foreign');
            $table->dropForeign(['client_id']);
        });
    }
}
