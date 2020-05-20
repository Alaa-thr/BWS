<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('numTelephone');
            $table->string('email');
            $table->enum('type_compte', ['a', 'c','v','e']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(array('id'=>'1','email'=>'basmah.work_shop@gmail.com','numTelephone'=>'0500000000','type_compte'=>'a','password'=>Hash::make('0123456789'),'created_at'=>new \dateTime,
            'updated_at'=>new \dateTime));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
