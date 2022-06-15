<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_visitantes', function (Blueprint $table) {
            $table->id();
            $table->integer('persona_id');
            $table->string('nonbre');
            $table->string('apellidos');
            $table->string('email');
            $table->integer('procedencia_id')->nullable();
            $table->integer('asiciado_id')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();

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
        Schema::dropIfExists('solicitudes_visitantes');
    }
};
