<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('cedula_presupuestaria')->nullable();
            $table->string('cuenta');
            $table->decimal('debe_inicial', 8, 2);
            $table->decimal('haber_inicial', 8, 2);
            $table->decimal('debe', 8, 2);
            $table->decimal('haber', 8, 2);
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
        Schema::dropIfExists('plan_cuentas');
    }
}
