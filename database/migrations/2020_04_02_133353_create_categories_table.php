<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('typeCategorie')->nullable();
            $table->unique(['libelle', 'typeCategorie']);
            $table->timestamps();
        });
        DB::table('categories')->insert(array('id'=>'1','libelle'=>'Autre','typeCategorie'=>null,'created_at'=>new \dateTime,'updated_at'=>new \dateTime));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
