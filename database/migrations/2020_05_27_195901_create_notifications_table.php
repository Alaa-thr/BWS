<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('employeur_id')->nullable();
            $table->unsignedBigInteger('vendeur_id')->nullable();
            $table->unsignedBigInteger('signal_id')->nullable();
            $table->unsignedBigInteger('paiement_vendeur_id')->nullable();
            $table->unsignedBigInteger('paiement_employeur_id')->nullable();
            $table->string('categorie_libelle')->nullable();
            $table->string('sous_categorie_libelle')->nullable();
            $table->string('typeCategoSousCatego')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->foreign('employeur_id')->references('id')->on('employeurs');
            $table->foreign('signal_id')->references('id')->on('signals');
            $table->foreign('paiement_vendeur_id')->references('id')->on('paiement_vendeurs');
            $table->foreign('paiement_employeur_id')->references('id')->on('paiement_employeurs');
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
        Schema::dropIfExists('notifications');
    }
}
