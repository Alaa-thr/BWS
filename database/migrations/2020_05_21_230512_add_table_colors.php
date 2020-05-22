<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->timestamps();
        });
        $array = array(['id'=>'1','nom'=>'Red','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'2','nom'=>'Green','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'3','nom'=>'Blue','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'4','nom'=>'Black','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'5','nom'=>'White','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'6','nom'=>'Yellow','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'7','nom'=>'Pink','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'8','nom'=>'Gris','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'9','nom'=>'Brown','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'10','nom'=>'orange','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'11','nom'=>'Purple','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
        DB::table('colors')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
