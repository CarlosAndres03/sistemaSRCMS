<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $controlesPorSemestre = DB::table('CumplimientoControlMinimo')
            ->select('semestre', 'anio', DB::raw('count(*) as totalRegistros'))
            ->groupBy('semestre', 'anio')
            ->get();

        $totalesPorSemestre = [];
        foreach ($controlesPorSemestre as $semestre) {
            $totalesPorSemestre[$semestre->anio][$semestre->semestre] = $semestre->totalRegistros;
        }

        $controlCompletoPorSemestre = DB::table('CumplimientoControlMinimo')
            ->select('semestre', 'anio', DB::raw('count(*) as totalCompleto'))
            ->where('statusCumplimiento', 'Sí')
            ->groupBy('semestre', 'anio')
            ->get();

        $controlIncompletoPorSemestre = DB::table('CumplimientoControlMinimo')
            ->select('semestre', 'anio', DB::raw('count(*) as totalIncompleto'))
            ->where('statusCumplimiento', 'No')
            ->groupBy('semestre', 'anio')
            ->get();

        $totalesCompletosPorSemestre = [];
        $totalesIncompletosPorSemestre = [];

        foreach ($controlCompletoPorSemestre as $completo) {
            $totalesCompletosPorSemestre[$completo->anio][$completo->semestre] = $completo->totalCompleto;
        }

        foreach ($controlIncompletoPorSemestre as $incompleto) {
            $totalesIncompletosPorSemestre[$incompleto->anio][$incompleto->semestre] = $incompleto->totalIncompleto;
        }

        $porcentajeCumplimientoPorSemestre = [];
        $archivosSubidosPorSemestre = [];
        $archivosFaltantesPorSemestre = [];

        foreach ($totalesPorSemestre as $anio => $semestres) {
            foreach ($semestres as $semestre => $totalControles) {
                $totalCompleto = isset($totalesCompletosPorSemestre[$anio][$semestre]) ? $totalesCompletosPorSemestre[$anio][$semestre] : 0;
                $totalIncompleto = isset($totalesIncompletosPorSemestre[$anio][$semestre]) ? $totalesIncompletosPorSemestre[$anio][$semestre] : 0;

                $porcentajeCumplimiento = ($totalCompleto / $totalControles) * 100;

                $archivosSubidos = DB::table('CumplimientoControlMinimo')
                    ->where('semestre', $semestre)
                    ->where('anio', $anio)
                    ->whereNotNull('documentoEvidencia')
                    ->count();
                $archivosFaltantes = 96 - $archivosSubidos; // Cambiar 96 por el número total esperado de archivos

                $porcentajeCumplimientoPorSemestre[$anio][$semestre] = $porcentajeCumplimiento;
                $archivosSubidosPorSemestre[$anio][$semestre] = $archivosSubidos;
                $archivosFaltantesPorSemestre[$anio][$semestre] = $archivosFaltantes;
            }
        }

        return view('home', compact('controlesPorSemestre', 'porcentajeCumplimientoPorSemestre', 'archivosSubidosPorSemestre', 'archivosFaltantesPorSemestre', 'anio'));
    }
    public function guardarImagenLinea(Request $request)
    {
        $image = $request->input('image');

        // Ruta donde se guardarán las imágenes temporales
        $rutaTemporal = public_path('capturas_temporales');

        if (!file_exists($rutaTemporal)) {
            mkdir($rutaTemporal, 0777, true);
        }

        // Genera un nombre de archivo único con la extensión ".jpg"
        $nombreArchivo = 'captura_' . uniqid() . '.jpg';
        $rutaCompleta = $rutaTemporal . '/' . $nombreArchivo;

        // Elimina el encabezado de los datos base64
        $image = preg_replace('/^data:image\/(png|jpeg|jpg);base64,/', '', $image);

        // Decodifica los datos base64 en una imagen
        $imagen = base64_decode($image);

        // Guarda la imagen en el servidor en formato JPEG
        if (file_put_contents($rutaCompleta, $imagen)) {
            return response()->json(['success' => true, 'nombreImagen' => $nombreArchivo]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error al guardar la imagen en el servidor'], 500);
        }
    }


    public function generarPDF($nombreImagen)
    {
        // Ruta de la imagen capturada
        $rutaImagen = public_path('capturas_temporales/' . $nombreImagen);

        $controles = DB::table('ControlMinimos')
            ->get();

        $nombre = "Reporte general";

        $controlCompleto = $controles->filter(function ($control) {
            return $control->statusCumplimiento === 'Sí';
        });

        $controlIncompleto = $controles->filter(function ($control) {
            return $control->statusCumplimiento === 'No';
        });

        $totalControles = $controles->count();
        $totalCompleto = $controlCompleto->count();
        $totalIncompleto = $controlIncompleto->count();

        $porcentajeCumplimiento = ($totalCompleto / $totalControles) * 100;


        $data = [
            'controles' => $controles,
            'controlCompleto' => $controlCompleto,
            'controlIncompleto' => $controlIncompleto,
            'porcentajeCumplimiento' => $porcentajeCumplimiento,
            'etapa' => $nombre,
            'rutaImagen' => $rutaImagen, // Pasa la ruta de la imagen

        ];

        $pdf = PDF::loadView('controlminimo.reportepdf', $data);


        return $pdf->download('informe.pdf');
    }
    public function eliminarImagenLinea(Request $request)
    {
        $nombreImagen = $request->input('nombreImagen');

        // Ruta completa de la imagen a eliminar
        $rutaImagen = public_path('capturas_temporales/' . $nombreImagen);

        // Verifica si la imagen existe y la elimína
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        return response()->json(['success' => true]);
    }
}
