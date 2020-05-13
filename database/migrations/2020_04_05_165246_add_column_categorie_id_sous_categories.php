<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCategorieIdSousCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('souscategories', function (Blueprint $table) {
            $table->foreign('categorie_id')->references('id')->on('categories');     
        });
        DB::unprepared('ALTER TABLE `souscategories` DROP PRIMARY KEY ,ADD PRIMARY KEY (`id`,`categorie_id`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('souscategories', function (Blueprint $table) {
            $table->dropForeign('categories_categorie_id_foreign');
            $table->dropForeign(['categorie_id']);   
        });
    }
}
