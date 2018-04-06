<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('titulo');
            $table->integer('anio_edicion');
            $table->integer('numero_paginas');
            $table->string('portada');
            $table->string('sala');
            $table->string('idioma');
            $table->text('resumen');
            $table->date('fecha_incorporacion')->nullable();
            $table->date('fecha_desincorporacion')->nullable(); 
            $table->integer('publisher_id'); 
            $table->integer('speciality_id'); 
            $table->string('url')->nullable();
            $table->integer('clasificacion')->default(2);
            $table->string('subclasificacion');
            $table->integer('veces');
            $table->softDeletes();

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
        Schema::dropIfExists('books');
    }
}
