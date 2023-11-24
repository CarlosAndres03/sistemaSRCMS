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
        <div class="col-md-10">
            <div class="card" style="width: 60rem;">
                <h1 class="card-header">Sistemas, Aplicaciones y Servicios</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="fs-5 text-center">{{$control->descripcionControlMinimo}}</p>

                    @if($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        @foreach($errors->all() as $error)
                        <span class="badge badge-danger">{{$error}}</span>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" arial-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    
                    {!! Form::model($control, ['method'=>'PATCH', 'files' => true, 'route' => ['sis-app-serv.update',
                    $control->idControlMinimo]]) !!}
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones: </label>
                                {!! Form::textArea('observacionCumplimiento', null, array('class' => 'form-control' , 'required' => 'required'))!!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Atenciones: </label>
                                {!! Form::textArea('atencionCumplimiento', null, array('class' => 'form-control', 'required' => 'required'))!!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 ">
                            <div class="form-chexk"><br>
                                <label for="">¿Se implementó?</label><br>
                                <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="Sí" required>
                                <label class="form-check-label" for="flexRadioDefault1">Sí </label>
                                <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="No" required>
                                <label class="form-check-label" for="flexRadioDefault1">No</label>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6"><br>
                            <div class="input-group mb-3">
                                <label for="">Evidencia:</label> 
                            </div>
                            {!! Form::file('documentoEvidencia', ['class' => 'form-control', 'required' => 'required', 'accept' => '.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf']) !!}

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                                <label for="">Semestre</label><br>
                                <select class="form-control" id="semestre" name="semestre" required>
                                <option value="" selected disabled>Seleccione un semestre</option>
                                 <option value="Ene-Jun">Ene-Jun</option>
                                <option value="Jul-Dic">Jul-Dic</option>
                                </select>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                                <label for="">Año</label><br>
                                <select class="form-control" id="anio" name="anio" required>
                                <option value="" selected disabled>Seleccione un año</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>      
@endsection