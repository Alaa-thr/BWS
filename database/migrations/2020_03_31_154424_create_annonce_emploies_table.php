<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceEmploiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_emploies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeur_id');
            $table->unsignedBigInteger('sous_categorie_id')->nullable();
            $table->string('libellé');
            $table->text('discription');
            $table->integer('nombre_condidat')->default(1);
            $table->string('image')->nullable();
            $table->boolean('annonceE_attende')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonce_emploies');
    }
}
