<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EtapaTecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etapas = [
            'Planeación',
            'Gestión',
            'Recursos Humanos',
            'Equipos Físicos',
            'Centros de Datos',
            'Redes y Telecomunicaciones',
            'Equipo de Cómputo',
            'Tecnología Móvil',
            'Sistemas, Aplicaciones y Servicios',
            'Bases de Datos',


        ];
        foreach ($etapas as $etapa) {
            DB::table('EtapaTecnologicas')->insert([	            
                'nombreEtapaTecnologica' => $etapa,
           ]);
        }
    }
}
