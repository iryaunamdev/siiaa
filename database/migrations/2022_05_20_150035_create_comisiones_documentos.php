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
        Schema::create('comisiones_documentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('comision_id');
            $table->integer('tipo_id')->nullable();
            $table->string('titulo');
            $table->date('fecha');
            $table->string('filename');
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
        Schema::dropIfExists('comisiones_documentos');
    }
};
