<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementEmployeurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement_employeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeur_id');
            $table->unsignedBigInteger('admin_id');
            $table->boolean('response')->default(0);
            $table->enum('position_publication',['first','second','third'])->nullable();
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
        Schema::dropIfExists('paiement_employeurs');
    }
}
