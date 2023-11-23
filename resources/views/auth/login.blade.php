@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card offset-md-2 " style="width: 30rem;">
                <div class="card-header text-center text-white"style="background-color: #13322b;">{{ __('Inicio de sesión') }}</div>
                <!-- <img src="/images/usuario.png" class="card-img-top" max-width=10%>-->
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6 offset-md-3">
                                <input id="name" type="name"
                                    class="form-control @error('name') is-invalid @enderror text-center" name="name"
                                    value="{{ old('name') }}" placeholder="usuario" required autocomplete="name"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror text-center"
                                    name="password" placeholder="contraseña" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--<div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" required autocomplete="current-password">
                                    <option selected>Seleccione su rol</option>
                                    <option value="1">Adminisrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar usuario') }}
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn" text="white" style="background-color: #a42145";>
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidó su contraseña?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection