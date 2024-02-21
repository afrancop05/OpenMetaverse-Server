@extends('layouts.app')

@section('content')
<div class="sesiones">
    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1>Registro</h1>

            <div class="input-box">
                <input id="name" type="text" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <i class='bx bxs-lock-open-alt'></i>
            </div>

            <button type="submit" class="btn">{{ __('Registrarse') }}</button>

        </form>
    </div>
</div>

@endsection
