<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAportesSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aportes_socios', function (Blueprint $table) {
            $table->id();
            $table->integer('socio_id');
            $table->integer('user_id');
            $table->integer('tipo_pago');
            $table->integer('banco_id');
            $table->string('cuenta');
            $table->integer('total');
            $table->integer('estado');
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
        Schema::dropIfExists('aportes_socios');
    }
}
