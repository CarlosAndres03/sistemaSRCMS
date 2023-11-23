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
                <h4 class="card-header">Roles</h4>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('crear-rol')
                    <a class="btn btn-success" href="{{route('roles.create')}}"><i class="fa fa-plus">Nuevo</i></a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Rol</th>
                                    <th style="text-align:center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td style="text-align:center">
                                        {{$role->name}}
                                    </td>
                                    <td style="text-align:center">
                                        
                                        <a class="btn btn-sm btn-success" href="{{route('roles.edit', $role->id)}}"><i
                                                class="fa fa-edit"></i></a>
                                        
                                        {!! Form::open(['method' => 'DELETE', 'route'=> ['roles.destroy',
                                        $role->id], 'style'=>'display:inline'])!!}
                                        {!! Form::button('<i class="fa fa-trash"></i>',  ['type' => 'submit', 'class'=>'btn btn-sm btn-danger'])!!}
                                        {!!Form::close()!!}
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $roles->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection