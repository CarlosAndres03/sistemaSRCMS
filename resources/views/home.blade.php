@extends('layouts.vistaadministrador')
<link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.min.css') }}"/>
<link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
<style type="text/css">
.card {
    background-color: #fff;
    border-radius: 50px;
    border: none;
    position: relative;
    margin-bottom: 10px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
}

.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas,
.card .card-statistic-3 .card-icon-large .far,
.card .card-statistic-3 .card-icon-large .fab,
.card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: left;
    line-height: 20px;
    margin-left: 10px;
    color: #000;
    position: absolute;
    right: 140px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h1 class="card-header">{{ 'Bienvenido '.Auth::user()->name }}</h1>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row ">
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4" >
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-file-signature"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Planeación</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('planeacion.anios')}}" class="btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-solid fa-puzzle-piece"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Gestión</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('gestion.anios')}}" class="btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-users"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Recursos Humanos</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('rh.anios')}}" class="btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-desktop"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Equipos Físicos</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('equiposfisicos.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-server"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Centro de Datos</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('centrodatos.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-network-wired"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Redes y Telecomunicacioes</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('redtel.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-desktop"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Equipo de Cómputo</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('equipocomputo.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-signal"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Tecnología Móvil</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('tecmovil.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-laptop-code"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Sistemas, aplicaciones y servicios</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('sisappserv.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 d-flex">
                            <div class="card l-bg-green-dark flex-fill">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i
                                            class="fas fa-solid fa-database"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0 text-white">Bases de Datos</h5>
                                    </div>
                                    <p class="text-right"><a href="{{ route('bd.anios')}}" class="btn btn btn btn-light"><i class="fas fa-solid fa-plus"></i> Entrar</a></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h1 class="card-header">Gráfica de cumplimiento general</h1>
                <div class="card-body">
                <!--@can('editar-control mínimo')
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <h5>Descargar reporte
                        </h5><br><a class="btn btn-success" href="#" onclick="capturarImagenYGenerarPDF();"><i class="fas fa-file-pdf"></i></a>
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
                                <canvas id="graficaCumplimientoTodosProcesos" width="800" height="500"></canvas>
                            </div> -->
                            <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/html2canvas.js')}}"></script>
<script src="{{ asset('js/html2canvas.min.js')}}"></script>
<script src="{{ asset('js/chart.js')}}"></script>


<script>
        var porcentajeCumplimientoPorSemestre = {!! json_encode($porcentajeCumplimientoPorSemestre) !!};

        // Preparar los datos para Chart.js
        var labels = [];
        var data = [];
        Object.keys(porcentajeCumplimientoPorSemestre).forEach(function(anio) {
            Object.keys(porcentajeCumplimientoPorSemestre[anio]).forEach(function(semestre) {
                labels.push(anio + ' - Semestre ' + semestre);
                data.push(porcentajeCumplimientoPorSemestre[anio][semestre]);
            });
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Porcentaje de Cumplimiento por Semestre',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Porcentaje'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Semestre'
                        }
                    }
                }
            }
        });
    </script>

<script>
function capturarImagenYGenerarPDF() {
    html2canvas(document.getElementById('myChart')).then(function (canvas) {
        // Captura la imagen en formato JPG
        var image = canvas.toDataURL('image/jpeg');

        // Envia la imagen capturada al controlador
        fetch('{{ url('/guardar-imagen-linea') }}', {
            method: 'POST',
            body: JSON.stringify({ image: image }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Redirige al controlador que genera el PDF y pasa el nombre de la imagen
                window.open('{{ url('/generar-pdfCompleto2/') }}' + '/' + result.nombreImagen, '_blank');

                // Una vez que se ha descargado el PDF con éxito, envia una solicitud para eliminar la imagen
                fetch('{{ url('/eliminar-imagen-linea') }}', {
                    method: 'POST',
                    body: JSON.stringify({ nombreImagen: result.nombreImagen }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
            } else {
                alert('Error al guardar la imagen.');
            }
        })
        .catch(error => {
            alert('Error al guardar la imagen: ' + error);
        });
    });
}
</script>

@endsection