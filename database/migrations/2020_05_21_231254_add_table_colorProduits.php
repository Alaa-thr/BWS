<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableColorProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_produits', function (Blueprint $table) {
            $table->id();           
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
         //  $table->foreign('produit_id')->references('id')->on('produits');
           $table->foreign('color_id')->references('id')->on('colors');
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_produits');
    }
}
