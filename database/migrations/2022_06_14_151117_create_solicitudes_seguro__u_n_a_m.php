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
        Schema::create('solicitudes_seguro__u_n_a_m', function (Blueprint $table) {
            $table->id();
            $table->integer('persona_id');
            $table->integer('motivo_id');
            $table->integer('evento_id');
            $table->string('beneficiario');
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
        Schema::dropIfExists('solicitudes_seguro__u_n_a_m');
    }
};
