<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termini', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('pocetniDatum');
            $table->dateTime('zavrsniDatum');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ucionica_id')->unsigned();
            $table->foreign('ucionica_id')->references('id')->on('ucionice')->onDelete('cascade');
            $table->integer('tecaj_id')->unsigned();
            $table->foreign('tecaj_id')->references('id')->on('tecajevi')->onDelete('cascade');
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
        Schema::dropIfExists('termini');
    }
}
