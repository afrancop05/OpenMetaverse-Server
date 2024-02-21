@extends('layouts.app')

@section('content')
<div class="sesiones">
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Iniciar Sesión</h1>

            <div class="input-box">
                <input id="email" type="email" placeholder="Introduzca un Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input id="password" type="password" placeholder="Introduzca una Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class='bx bxs-lock-alt' ></i>
            </div>
            
            <div class="remember-forgot">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Recuerdame') }}</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn">{{ __('Entrar') }}</button>

            <div class="register-link">
                <p>¿No tienes una cuenta?<a href="{{ route('register') }}"> Registrate</a></p>
            </div>
        </form>
    </div>
</div>

@endsection
