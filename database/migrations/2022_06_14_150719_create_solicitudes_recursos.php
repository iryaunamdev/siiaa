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
        Schema::create('solicitudes_recursos', function (Blueprint $table) {
            $table->id();
            $table->integer('persona_id');
            $table->integer('origen_id');
            $table->integer('proposito_id');
            $table->text('info_adicional');
            $table->integer('ausencia_id')->nullable();
            $table->integer('dias_nacionales')->nullable();
            $table->integer('dias_internacionales')->nullable();
            $table->integer('monto_avion')->nullable();
            $table->integer('monto_cuota')->nullable();
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
        Schema::dropIfExists('solicitudes_recursos');
    }
};
