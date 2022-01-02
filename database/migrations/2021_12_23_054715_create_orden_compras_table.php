<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('ordc_gasto', 8, 2);
            $table->decimal('ordc_asignacion', 8, 2);
            $table->decimal('ordc_saldo', 8, 2);
            $table->integer('proveedor_id');
            $table->string('descripcion');
            $table->integer('status');
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
        Schema::dropIfExists('orden_compras');
    }
}
