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
        Schema::table('sous_categories', function (Blueprint $table) {
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('SET NULL');     
        });
        DB::table('sous_categories')->insert(array('id'=>'1','libelle'=>'Autre','categorie_id'=>1,'created_at'=>new \dateTime,'updated_at'=>new \dateTime));
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sous_categories', function (Blueprint $table) {
            $table->dropForeign('categories_categorie_id_foreign');
            $table->dropForeign(['categorie_id']);   
        });
    }
}
