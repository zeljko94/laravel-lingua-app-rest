<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecajeviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecajevi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->text('opis')->default('');
            $table->integer('vjestinaID')->unsigned();
            $table->foreign('vjestinaID')->references('id')->on('vjestine');
            $table->integer('predavacID')->unsigned();
            $table->foreign('predavacID')->references('id')->on('users');
            $table->integer('razinaNastaveID')->unsigned();
            $table->foreign('razinaNastaveID')->references('id')->on('razine-nastave');
            $table->integer('tipNastaveID')->unsigned();
            $table->foreign('tipNastaveID')->references('id')->on('tipovi-nastave');
            $table->string('sudionici');
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
        Schema::dropIfExists('tecajevi');
    }
}
