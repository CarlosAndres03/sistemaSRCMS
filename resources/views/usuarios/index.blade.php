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
                <h4 class="card-header">Usuarios</h4>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success" href="{{route('usuarios.create')}}"><i class="fa fa-plus">
                                Nuevo</i></a>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <thead style="background-color:#6777ef;">
                                <tr>
                                    <th style="text-align:center">Id</th>
                                    <th style="text-align:center">Usuario</th>
                                    <th style="text-align:center">E-mail</th>
                                    <th style="text-align:center">Rol</th>
                                    <th style="text-align:center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td style="text-align:center">
                                        {{$usuario->id}}
                                    </td>
                                    <td style="text-align:center">
                                        {{$usuario->name}}
                                    </td>
                                    <td style="text-align:center">
                                        {{$usuario->email}}
                                    </td>
                                    <td style="text-align:center">
                                        @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolName)
                                        <h5><span>{{$rolName}}</span></h5>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('usuarios.edit', $usuario->id) }}"><i
                                                class="fa fa-edit"></i></a>

                                        {!! Form::open(['method' => 'DELETE', 'route'=> ['usuarios.destroy',
                                        $usuario->id], 'style'=>'display:inline'])!!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-sm btn-danger'])!!}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection