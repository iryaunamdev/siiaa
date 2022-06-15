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
        Schema::create('personas_ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->nullable();
            $table->string('email')->nullable();
            $table->integer('tipo_id');
            $table->integer('persona_id');
            $table->integer('contrato_id')->nullable();
            $table->integer('nombramiento_id')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('orcid')->nullable();
            $table->integer('sni_id')->nullable();
            $table->integer('pride_id')->nullable();
            $table->integer('pride_y')->nullable();
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
        Schema::dropIfExists('personas_ingresos');
    }
};
