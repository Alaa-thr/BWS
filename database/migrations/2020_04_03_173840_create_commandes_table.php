<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('vendeur_id');
            $table->unsignedBigInteger('produit_id');
            $table->string('address')->nullable();
            $table->boolean('Réponse_vendeur')->default(1);
            $table->integer('qte');
            $table->enum('type_livraison',['dhl', 'vc' , 'cv']);
            $table->string('email')->nullable();
            $table->string('numero_tlf')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('ville')->nullable();
            $table->boolean('commande_envoyee')->default(0);
            $table->boolean('commande_traiter')->default(0);
            $table->timestamps(); 
            
            $table->double('prix_produit',20, 2);;


        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
