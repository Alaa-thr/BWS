<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeChoisirVendeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeChoisirVendeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendeur_id');
            $table->enum('type_livraison',['dhl','vc','cv']);
            $table->timestamps();
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->unique(['vendeur_id', 'type_livraison']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typeChoisirVendeurs');
    }
}
