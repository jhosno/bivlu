<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');  
            $table->string('estado');
            $table->integer('item_id');
            $table->integer('user_id');
            $table->string('nombre_responsable')->nullable();
            $table->string('telefono_responsable')->nullable();
            $table->datetime('fecha_retirado')->nullable();
            $table->datetime('fecha_expiracion')->nullable();
            $table->datetime('fecha_devuelto')->nullable();
            $table->boolean('confirmado')->default(true);
            $table->text('observaciones');
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
        Schema::dropIfExists('loans');
    }
}
