<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomunDeletedvVendeurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendeurs', function (Blueprint $table) {
            $table->boolean('deletedv')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendeurs', function (Blueprint $table) {
            $table->dropColumn('deletedv');
        });
    }
}
