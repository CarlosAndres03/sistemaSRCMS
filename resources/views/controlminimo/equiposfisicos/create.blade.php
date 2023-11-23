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
                <h1 class="card-header">Equipos Físicos</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="fs-3 text-center">Crea un nuevo registro</p>
                    <form action="{{ route('equipos-fisicos.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="">Control mínimo: </label>
                            <textArea class="form-control" name="descripcionControlMinimo" type='text' placeholder="Descripción del control mínimo" required></textArea>
                        </div><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input class="btn btn-success" type="submit" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection