@extends('layouts.vistaadministrador')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Soporte</h4>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Carlos Manuel Andrés Trujillo</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Soporte general</h6>
                        <a href="https://wa.me/+522311445400" class="card-link">WhatsApp</a>
                        <a href="https://www.facebook.com/carlos.manuel.andres.trujillo?mibextid=ZbWKwL" class="card-link">Facebook</a>
                        <a href="#" class="card-link">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection