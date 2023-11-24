<?php

namespace App\Http\Controllers;

use App\Models\ControlMinimo;
use App\Models\CumplimientoControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Storage;

class PlaneacionController extends Controller
{
 
    public function index(Request $request)
    {
        $year = $request->input('year');
        $semester = $request->input('semester');
    
        $controles = ControlMinimo::with(['cumplimientoControlMinimo' => function ($query) use ($year, $semester) {
            $query->where('anio', $year)->where('semestre', $semester);
        }])
        ->where('idEtapaTecnologica', 1)
        ->get();
    
        // Calcula el total de controles
        $totalControles = $controles->count();
        $totalCompleto = 0;
        $totalIncompleto = 0;
        $archivosSubidos = 0;
    
        foreach ($controles as $control) {
            $ultimaActualizacion = $control->cumplimientoControlMinimo->last();
            if ($ultimaActualizacion) {
                if ($ultimaActualizacion->statusCumplimiento === 'Sí') {
                    $totalCompleto++;
                } else {
                    $totalIncompleto++;
                }
    
                if ($ultimaActualizacion->documentoEvidencia) {
                    $archivosSubidos++;
                }
            }
        }
    
        $porcentajeCumplimiento = ($totalCompleto / $totalControles) * 100;
        $archivosFaltantes = 7 - $archivosSubidos;
    
        return view('controlminimo.planeacion.index', compact('controles', 'porcentajeCumplimiento', 'archivosSubidos', 'archivosFaltantes','year','semester'));
    }

    public function create(Request $request)
    {
        return view('controlminimo.planeacion.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'descripcionControlMinimo' => 'required'
        ]);

        $controlminimo = new ControlMinimo;
        $controlminimo->idEtapaTecnologica = 1;
        $user = auth()->id();
        $controlminimo->idUsuario = $user;
        $controlminimo->statusCumplimiento = '';
        $controlminimo->documentoEvidencia = '';
        $controlminimo->observacionCumplimiento = '';
        $controlminimo->atencionCumplimiento = '';
        $controlminimo->semestre = '';
        $controlminimo->descripcionControlMinimo = $request->input('descripcionControlMinimo');
        $controlminimo->save();
        return redirect()->route('planeacion.index');

        /*$control_minimo = DB::insert('INSERT INTO ControlMinimos(descripcionControlMinimo) VALUES ($request)');
        return view('controlminimo.planeacion.index', compact('control_minimo'));

        $control_minimo = request()->except('_token');
        DB::table('ControlMinimos')->insert(['idEtapaTecnologica'=> 1, 'idUsuario'=> 1, 'descripcionControlMinimo' => 'dfgefg', 'statusCumplimiento'=> '', 'documentoEvidencia'=> '',
        'observacionCumplimiento'=> '', 'atencionCumplimiento'=> '']);
        return view('controlminimo.planeacion.index');*/
    }
    public function edit(string $id)
    {
        $control = ControlMinimo::find($id);
        $currentYear = date('Y');
        $years = range(2022, $currentYear);
        return view('controlminimo.planeacion.edit', compact('control', 'years'));
    }
    public function update(Request $request, $id)
    {
        $user = auth()->id();
    
        // Crear una nueva instancia de CumplimientoControl
        $control = new CumplimientoControl([
            'idUsuario' => $user,
            'statusCumplimiento' => $request->input('respuesta'),
            'semestre' => $request->input('semestre'),
            'anio' => $request->input('anio'),
            'observacionCumplimiento' => $request->input('observacionCumplimiento'),
            'atencionCumplimiento' => $request->input('atencionCumplimiento'),
        ]);
    
        // Resto del código para manejar el archivo si existe
        if ($request->hasFile('documentoEvidencia')) {
            $archivo = $request->file('documentoEvidencia');
            
            // Validar las extensiones permitidas
            $extensionesPermitidas = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf'];
        
            // Obtener la extensión del archivo
            $extensionArchivo = $archivo->getClientOriginalExtension();
        
            // Verificar si la extensión está permitida
            if (in_array(strtolower($extensionArchivo), $extensionesPermitidas)) {
                // Generar un nombre único para el archivo usando la marca de tiempo actual
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName(); // puedes usar otra lógica para nombrar
                
                // Mover el archivo con el nuevo nombre a la ubicación deseada
                $archivo->move(public_path() . '/archivos/', $nombreArchivo);
                
                // Asignar el nombre personalizado al campo en tu modelo (supongo que $control es el modelo)
                $control->documentoEvidencia = $nombreArchivo;
            } else {
                // Si la extensión no está permitida, puedes retornar un mensaje de error o realizar alguna acción
                return redirect()->back()->with('Solo se permiten archivos de tipo Word, Excel, PowerPoint o PDF.');
            }
        }
    
        // Obtener el ControlMinimo
        $controlMinimo = ControlMinimo::find($id);
    
        // Asociar el ControlMinimo al CumplimientoControl
        if ($controlMinimo) {
            $controlMinimo->cumplimientoControlMinimo()->save($control);
        }
    
        return redirect()->route('planeacion.index', [
            'year' => $request->input('anio'),
            'semester' => $request->input('semestre')
        ]);
    }
    
    public function destroy($idControlMinimo)
    {
        ControlMinimo::destroy($idControlMinimo);
        return redirect()->route('planeacion.index');
    }

    public function download($control)
    {
        $control = ControlMinimo::findOrFail($control);
    
        if ($control->cumplimientoControlMinimo->isNotEmpty()) {
            $latestCumplimiento = $control->cumplimientoControlMinimo->last();
    
            if ($latestCumplimiento->documentoEvidencia) {
                $pathToFile = public_path("archivos/{$latestCumplimiento->documentoEvidencia}");
                return \Response::download($pathToFile);
            }
        }
    
        // Manejar el caso en que no se encuentra el archivo asociado al cumplimiento de este control
        return response()->json(['message' => 'No se encontró el archivo asociado a este control.']);
    }

    public function filtrar(Request $request)
    {
        $semestreSeleccionado = $request->input('semestre');
        $controles = DB::table('ControlMinimos')
            ->where('idEtapaTecnologica', 1)
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
        $archivosSubidos = $controles->where('documentoEvidencia')->where('idEtapaTecnologica', 1)->count();
        $archivosFaltantes = 7 - $archivosSubidos; // Cambia 100 por el número total esperado de archivos


        // Realiza la consulta a la base de datos con el semestre seleccionado
        $controlesFiltrados = ControlMinimo::where('semestre', $semestreSeleccionado)->where('idEtapaTecnologica', 1)->get();

        return view('controlminimo.planeacion.index', ['controles' => $controlesFiltrados], compact('controles', 'controlCompleto', 'controlIncompleto', 'porcentajeCumplimiento', 'archivosSubidos', 'archivosFaltantes'));
    }
    
    public function generarPDF(Request $request)
{
    $year = $request->input('year');
    $semester = $request->input('semester');
    
    $controles = ControlMinimo::with(['cumplimientoControlMinimo' => function ($query) use ($year, $semester) {
            $query->where('anio', $year)->where('semestre', $semester);
        }])
        ->where('idEtapaTecnologica', 1)
        ->get();

    $totalControles = $controles->count();
    $totalCompleto = 0;
    $totalIncompleto = 0;
    $archivosSubidos = 0;

    foreach ($controles as $control) {
        $ultimaActualizacion = $control->cumplimientoControlMinimo->last();
        if ($ultimaActualizacion) {
            if ($ultimaActualizacion->statusCumplimiento === 'Sí') {
                $totalCompleto++;
            } else {
                $totalIncompleto++;
            }

            if ($ultimaActualizacion->documentoEvidencia) {
                $archivosSubidos++;
            }
        }
    }

    $porcentajeCumplimiento = ($totalCompleto / $totalControles) * 100;
    $archivosFaltantes = 7 - $archivosSubidos;

    $nombreEtapaTecnologica = DB::table('EtapaTecnologicas')
             ->where('idEtapaTecnologica', 1)
             ->value('nombreEtapaTecnologica');

    $data = [
        'controles' => $controles,
        'totalCompleto' => $totalCompleto,
        'totalIncompleto' => $totalIncompleto,
        'porcentajeCumplimiento' => $porcentajeCumplimiento,
        'etapa' => $nombreEtapaTecnologica,
        'archivosSubidos' => $archivosSubidos,
        'archivosFaltantes' => $archivosFaltantes,
        'year' => $year, // Pasando el año a la vista
        'semester' => $semester, // Pasando el semestre a la vista
    ];

    $pdf = PDF::loadView('controlminimo.reportepdf', $data);
    return $pdf->download('informe.pdf');
}

    public function anios()
    {
        $currentYear = date('Y');
        $years = range(2022, $currentYear); // Genera un array con los años desde 2021 hasta el año actual
        return view('controlminimo.planeacion.anios', compact('years'));
    }
}