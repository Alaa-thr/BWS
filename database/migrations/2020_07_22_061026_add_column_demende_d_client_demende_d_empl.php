<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDemendeDClientDemendeDEmpl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_emploies', function (Blueprint $table) {
            $table->boolean('demandeDClient')->default(0)->after('demmande_traiter');
            $table->boolean('demandeDEmpl')->default(0)->after('demmande_traiter');
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
            $table->dropColumn('demandeDClient');
            $table->dropColumn('demandeDEmpl');
        });
    }
}
