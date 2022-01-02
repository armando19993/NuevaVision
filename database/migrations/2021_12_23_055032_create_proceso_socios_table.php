<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_socios', function (Blueprint $table) {
            $table->id();
            $table->integer('socio_id');
            $table->string('lugar');
            $table->string('detalle');
            $table->decimal('valor', 8, 2);
            $table->integer('creador_id');
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
        Schema::dropIfExists('proceso_socios');
    }
}
