<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_documento');
            $table->integer('documento');
            $table->string('nombres');
            $table->string('direccion');
            $table->integer('telefono')->nullable();
            $table->integer('movil')->nullable();
            $table->string('correo');
            $table->string('foto')->nullable();
            $table->string('documento_pdf')->nullable();
            $table->string('ficha_pdf')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('nombres_referencia');
            $table->integer('movil_referencia');
            $table->integer('fuerza');
            $table->integer('estado');
            $table->integer('pago')->nullable();
            $table->integer('saldo')->nullable()->default('0');;
            $table->string('observacion')->nullable();
            $table->integer('mies');
            $table->integer('mt');
            $table->integer('user_id')->nullable();
            $table->integer('banco_id')->nullable();
            $table->integer('convenio')->nullable();
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
        Schema::dropIfExists('socios');
    }
}
