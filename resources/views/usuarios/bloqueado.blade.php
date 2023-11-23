@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card offset-md-2 " style="width: 30rem;">
                <div class="card-header text-center text-white"style="background-color: #ff0000;">{{ __('Alerta') }}</div>
                <div class="card-body">
                <p class="fs-3 text-center">Usuario bloqueado, por favor contacte al administrador</p>
                <p class="fs-4 text-center">Gracias</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection