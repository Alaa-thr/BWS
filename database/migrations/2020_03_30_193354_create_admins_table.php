<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('big_admin')->default(0);
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('numTelephone')->unique();
            $table->string('numCarteBanquaire')->unique();
            $table->string('image')->default('NULL');
            $table->timestamps();
        });
        DB::table('admins')->insert(array('id'=>'1','user_id'=>'1','nom'=>'BWS','prenom'=>'BWS','email'=>'basmah.work_shop@gmail.com','numTelephone'=>'0500000000','numCarteBanquaire'=>'0000001','created_at'=>new \dateTime,
            'updated_at'=>new \dateTime,'big_admin'=>'1'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
