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
        Schema::create('CumplimientoControlMinimo', function (Blueprint $table){
            $table -> id('idCumplimiento');
            $table -> unsignedBigInteger('idUsuario');
            $table -> unsignedBigInteger('idControlMinimo');
            $table -> string('statusCumplimiento');
            $table -> string('documentoEvidencia');
            $table -> string('observacionCumplimiento');
            $table -> string('atencionCumplimiento');
            $table -> string('semestre');
            $table -> integer('anio');
            $table -> timestamps();
            $table -> foreign('idControlMinimo')->references('idControlMinimo')->on('ControlMinimos');
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
