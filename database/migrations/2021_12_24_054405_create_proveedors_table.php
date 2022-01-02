<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->integer('documento');
            $table->string('razon_social');
            $table->string('observaciones')->nullable();
            $table->integer('telefono');
            $table->integer('movil');
            $table->string('correo');
            $table->integer('credito');
            $table->integer('tiempo_credito')->nullable();
            $table->integer('obligado');
            $table->integer('status');
            $table->integer('creador_id');
            $table->integer('cuenta_id')->nullable();
            $table->string('serie')->nullable();
            $table->string('secuencia')->nullable();
            $table->string('autorizacion')->nullable();
            $table->date('caducidad')->nullable();
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
        Schema::dropIfExists('proveedors');
    }
}
