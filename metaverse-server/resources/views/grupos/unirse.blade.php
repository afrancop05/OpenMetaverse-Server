@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info-subtle">{{ __('Unirse a un Grupo') }}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form action="{{ route('amigos.store') }}" method="post">
                                @method("post")
                                @csrf
                                <br>
                                <div class="form-group">
                                    <label for="codigoacceso">Código de acceso</label>
                                    <input type="text" class="form-control" name="codigoacceso" id="codigoacceso" aria-describedby="codigoaccesoHelp" placeholder="Escribe aquí">
                                    <br>
                                    <small id="codigoaccesoHelp" class="form-text text-muted">Introduce el código del amigo invisible al que quieres unirte</small>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-outline-info">Unirse</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
