@extends('layouts.vistaadministrador')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h1 class="card-header">
                    Equipos Físicos
                </h1>
                <div class="card-body">
                    <div class="accordion" id="yearAccordion">
                    @foreach($years as $year)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $year }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $year }}" aria-expanded="true"
                    aria-controls="collapse{{ $year }}">
                    {{ $year }}
                </button>
            </h2>
            <div id="collapse{{ $year }}" class="accordion-collapse collapse"
                aria-labelledby="heading{{ $year }}" data-bs-parent="#yearAccordion">
                <div class="accordion-body">
                    <div>
                        <a href="{{ route('equipos-fisicos.index', ['year' => $year, 'semester' => 'ene-jun']) }}"
                            class="btn btn-success btn-sm">Semestre Ene-Jun</a>
                        <a href="{{ route('equipos-fisicos.index', ['year' => $year, 'semester' => 'jul-dic']) }}"
                            class="btn btn-success btn-sm">Semestre Jul-Dic</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection