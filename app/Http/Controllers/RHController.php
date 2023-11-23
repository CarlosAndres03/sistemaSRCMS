<?php

namespace App\Http\Controllers;

use App\Models\ControlMinimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Storage;

class RHController extends Controller
{
    public function index()
{
    $controles = DB::table('ControlMinimos')
        ->where('idEtapaTecnologica', 3)
        ->get();

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

    $archivosSubidos = $controles->where('documentoEvidencia')->where('idEtapaTecnologica', 3)->count();
    $archivosFaltantes = 6 - $archivosSubidos;// Cambia 100 por el número total esperado de archivos
    return view('controlminimo.recursoshumanos.index', compact('controles', 'controlCompleto', 'controlIncompleto', 'porcentajeCumplimiento','archivosSubidos','archivosFaltantes'));
    
}
    public function create(Request $request)
    {
        return view ('controlminimo.recursoshumanos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'descripcionControlMinimo' => 'required'
        ]);

        $controlminimo = new ControlMinimo;
        $controlminimo->idEtapaTecnologica = 3;
        $user = auth()->id();
        $controlminimo->idUsuario = $user;
        $controlminimo->statusCumplimiento = '';
        $controlminimo->documentoEvidencia = '';
        $controlminimo->observacionCumplimiento = '';
        $controlminimo->atencionCumplimiento = '';
        $controlminimo->semestre = '';
        $controlminimo->descripcionControlMinimo = $request->input('descripcionControlMinimo');
        $controlminimo->save();
        return redirect()->route('rh.index');
        
        /*$control_minimo = DB::insert('INSERT INTO ControlMinimos(descripcionControlMinimo) VALUES ($request)');
        return view('controlminimo.planeacion.index', compact('control_minimo'));

        $control_minimo = request()->except('_token');
        DB::table('ControlMinimos')->insert(['idEtapaTecnologica'=> 1, 'idUsuario'=> 1, 'descripcionControlMinimo' => 'dfgefg', 'statusCumplimiento'=> '', 'documentoEvidencia'=> '',
        'observacionCumplimiento'=> '', 'atencionCumplimiento'=> '']);
        return view('controlminimo.planeacion.index');*/
    }
    public function edit(string $id){
        $control = ControlMinimo::find($id);
        return view('controlminimo.recursoshumanos.edit', compact('control'));
    }
    public function update(Request $request, $id){
        $control = ControlMinimo::find($id);
        $control->idEtapaTecnologica = 3;
        $user = auth()->id();
        $control->idUsuario = $user;
        $control->statusCumplimiento = $request->input('respuesta');
        $control->semestre = $request->input('semestre');
        //$control->documentoEvidencia = $request->file('documentoEvidencia');
        if ($request->hasFile('documentoEvidencia')) {
            $archivo=$request->file('documentoEvidencia');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $control->documentoEvidencia=$archivo->getClientOriginalName();
        }
        $control->observacionCumplimiento = $request->input('observacionCumplimiento');
        $control->atencionCumplimiento = $request->input('atencionCumplimiento');
        $control->save();
        return redirect()->to(url('/rh'));
    }
    public function destroy($idControlMinimo)
    {
        ControlMinimo::destroy($idControlMinimo);
        return redirect()->route('rh.index');
    }

    public function download($control)
    {
        $doc = DB::table('ControlMinimos')->where('idControlMinimo', $control)->first();
        $pathToFile = public_path("archivos/{$doc->documentoEvidencia}");
        return \Response::download($pathToFile);
    }

    public function filtrar(Request $request)
    {
        $semestreSeleccionado = $request->input('semestre');
        $controles = DB::table('ControlMinimos')
        ->where('idEtapaTecnologica', 3)
        ->where('semestre', $semestreSeleccionado)
        ->get();

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
    $archivosSubidos = $controles->where('documentoEvidencia')->where('idEtapaTecnologica', 3)->count();
    $archivosFaltantes = 6 - $archivosSubidos;// Cambia 100 por el número total esperado de archivos
        

        // Realiza la consulta a la base de datos con el semestre seleccionado
        $controlesFiltrados = ControlMinimo::where('semestre', $semestreSeleccionado)->where('idEtapaTecnologica', 3)->get();

        return view('controlminimo.recursoshumanos.index', ['controles' => $controlesFiltrados], compact('controles', 'controlCompleto', 'controlIncompleto', 'porcentajeCumplimiento', 'archivosSubidos', 'archivosFaltantes'));
    }
    public function generarPDF()
    {
        $controles = DB::table('ControlMinimos')
            ->where('idEtapaTecnologica', 3)
            ->get();
        
            $nombreEtapaTecnologica = DB::table('EtapaTecnologicas')
             ->where('idEtapaTecnologica', 3)
                ->value('nombreEtapaTecnologica');

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
            'etapa' => $nombreEtapaTecnologica,
        ];

        $pdf = PDF::loadView('controlminimo.reportepdf', $data);

        return $pdf->download('informe.pdf');
    }
}