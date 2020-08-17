<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('vendeur_id')->nullable();
            $table->unsignedBigInteger('paiement_vendeur_id')->nullable();
            $table->unsignedBigInteger('paiement_employeur_id')->nullable();
            $table->string('categorie_libelle')->nullable();
            $table->string('sous_categorie_libelle')->nullable();
            $table->string('typeCategoSousCatego')->nullable();
            $table->unsignedBigInteger('cmd_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');        
            $table->foreign('paiement_vendeur_id')
            ->references('vendeur_id')
            ->on('paiement_vendeurs')
            ->onDelete('cascade'); 

            $table->foreign('paiement_employeur_id')
            ->references('employeur_id')
            ->on('paiement_employeurs')
            ->onDelete('cascade');

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
        Schema::dropIfExists('notificationes');
    }
}
