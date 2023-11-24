@extends('layouts.vistaadministrador')
<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h1 class="card-header">Equipo de Cómputo</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- <form method="POST" action="{{ route('filtrar.informacion') }}">
                        @csrf
                        <div class="col-md-3">

                            <label for="semestre" style="display: inline-block; margin-bottom: 0;">Seleccionar
                                Semestre:</label>
                            <select class="form-control" id="semestre" name="semestre"
                                style="display: inline-block; width: 70%;">
                                <option value="" selected disabled>Seleccione un semestre</option>
                                <option value="Ene-Jun">Ene-Jun</option>
                                <option value="Jul-Dic">Jul-Dic</option>
                            </select>
                            <button class="btn btn-sm btn-success" type="submit" style="display: inline-block;"><i
                                    class="fa fa-search"></i></button>
                            <a class="btn btn-sm btn-success" href="{{route('planeacion.index')}}"
                                style="display: inline-block;"><i class="fa fa-rotate-left"></i></a>

                        </div>
                    </form>-->
                    @can('editar-control mínimo')
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success" href="{{route('equipo-computo.create')}}"><i class="fa fa-plus">
                                Nuevo</i></a>
                    </div>
                    @endcan
                    <br>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Control mínimo</th>
                                    <th style="text-align:center">¿Se implementó?</th>
                                    <th style="text-align:center">Evidencia</th>
                                    <th style="text-align:center">Observaciones</th>
                                    <th style="text-align:center">Atenciones</th>
                                    <th style="text-align:center">Semestre</th>
                                    <th style="text-align:center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($controles as $control)
                                <tr>
                                    <td style="text-align:justify">
                                        <h6>{{$control->descripcionControlMinimo}}</h6>
                                    </td>
                                    <td style="text-align:center">
                                        <!-- Muestra la imagen de la última actualización -->
                                        @if ($control->cumplimientoControlMinimo->isNotEmpty())
                                        @php
                                        $latestStatus = $control->cumplimientoControlMinimo->last()->statusCumplimiento;
                                        @endphp
                                        @if ($latestStatus == "Sí")
                                        <img src="/images/chek.png">
                                        @else
                                        <img src="/images/false.png">
                                        @endif
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if ($control->cumplimientoControlMinimo->isNotEmpty())
                                        @php
                                        $latestActualizacion = $control->cumplimientoControlMinimo->last();
                                        @endphp
                                        @if ($latestActualizacion->documentoEvidencia)
                                        <a href="{{url('/download/'.$control->idControlMinimo)}}"><i
                                                class="fa fa-file"></i></a>
                                        @else
                                        <i class="fa fa-exclamation"></i>
                                        @endif
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if ($control->cumplimientoControlMinimo->isNotEmpty())
                                        {{$latestActualizacion->observacionCumplimiento}}
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if ($control->cumplimientoControlMinimo->isNotEmpty())
                                        {{$latestActualizacion->atencionCumplimiento}}
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if ($control->cumplimientoControlMinimo->isNotEmpty())
                                        {{$latestActualizacion->semestre}}
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('equipo-computo.edit', $control->idControlMinimo)}}"><i
                                                class="fa fa-edit"></i></a>
                                        <!--@can('editar-control mínimo')
                    <form action="{{ route('planeacion.destroy', $control->idControlMinimo) }}" method="post"
                        style="display: inline-block;" onsubmit="return confirm('¿Desea eliminar?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                @endcan-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h1 class="card-header">Gráficas de cumplimiento</h1>
                <div class="card-body">
                    @can('editar-control mínimo')
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <h5>Descargar reporte
                        </h5><br><a class="btn btn-success"
                            href="{{ route('reporte.generarEC', ['year' => $year, 'semester' => $semester]) }}"><i
                                class="fa fa-download"></i></a>
                    </div>
                    @endcan
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <h2 style="text-align: center">Cumplimiento de controles mínimos</h2>
                                <canvas id="doughnutChart" style="max-width: 100%; height: auto;"></canvas>
                            </div>
                            <div class="col-md-5">
                                <h2 h2 style="text-align: center">Cumplimiento de documentación</h2>
                                <canvas id="miGrafica" style="max-width: 100%; height: auto;"></canvas>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <div style="display: flex; justify-content: flex-end; width: 80rem;">
                <a class="btn btn-success" href="{{ route('gestion.index') }}"
                    style="display: inline-block; float: right;">
                    Ir a la siguiente etapa <i class="fa fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- Sección de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@0.5.0/dist/html2canvas.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Configuración y datos para la primera gráfica
            var porcentajeCumplimiento = {{ $porcentajeCumplimiento }};
            var data = {
                datasets: [{
                    data: [porcentajeCumplimiento, 100 - porcentajeCumplimiento],
                    backgroundColor: ["#00b569", "#ff0000"],
                }],
                labels: ['Sí cumple', 'No cumple'],
            };
            var options = {
                responsive: true,
                cutoutPercentage: 50,
            };
            var ctx = document.getElementById('doughnutChart').getContext('2d');
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });

            // Configuración y datos para la segunda gráfica
            var archivosSubidos = {!! $archivosSubidos !!};
            var archivosFaltantes = {!! $archivosFaltantes !!};
            var secondData = {
                labels: ['Subida', 'Faltante'],
                datasets: [{
                    data: [archivosSubidos, archivosFaltantes],
                    backgroundColor: ["#00b569", "#ff0000"],
                }],
            };
            var secondCtx = document.getElementById('miGrafica').getContext('2d');
            var mySecondChart = new Chart(secondCtx, {
                type: 'doughnut',
                data: secondData,
            });
        });
    </script>
@endsection