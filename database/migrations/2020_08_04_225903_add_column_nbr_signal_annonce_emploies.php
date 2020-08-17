<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNbrSignalAnnonceEmploies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annonce_emploies', function (Blueprint $table) {
            $table->integer('nbr_signal')->default(0);
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
            $table->dropColumn('nbr_signal');
        });
    }
}
