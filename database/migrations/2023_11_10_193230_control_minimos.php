<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ControlMinimos', function (Blueprint $table){
            $table -> id('idControlMinimo');
            $table -> unsignedBigInteger('idEtapaTecnologica');
            $table -> unsignedBigInteger('idUsuario');
            $table -> string('descripcionControlMinimo');
            $table -> string('statusCumplimiento');
            $table -> string('documentoEvidencia');
            $table -> string('observacionCumplimiento');
            $table -> string('atencionCumplimiento');
            $table -> string('semestre');
            $table -> timestamps();
            $table -> foreign('idEtapaTecnologica')->references('idEtapaTecnologica')->on('EtapaTecnologicas');
            $table -> foreign('idUsuario')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
