<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nac_est');
            $table->integer('ced_est');
            $table->string('pais');
            $table->string('nom_est');
            $table->string('ape_est');
            $table->string('sexo');
            $table->date('fecha_nac');
            $table->string('municipio_nac');
            $table->string('edo_nac');
            $table->string('edo_civil');
            $table->string('telf_est');
            $table->string('dir_est');
            $table->string('correo');
            $table->integer('disca_est');
            $table->string('tipo_disc');
            $table->string('grado');
            $table->string('estado_direccion');
            $table->string('mun_direccion');
            $table->integer('afrodes');
            $table->string('lugarn');
            $table->string('ciuh');
            $table->sring('tobte');
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
        Schema::dropIfExists('estudiantes');
    }
}
