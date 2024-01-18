{{--
    Documentacion blade (@):
    https://laravel.com/docs/9.x/blade

    Usamos como base la plantilla resources/views/layouts/app.blade.php
    Queda ver el botón de acceso a esta página en la cabecera en ese fichero (Usuarios)
--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info-subtle">{{ "Lista de Grupos" }}

                    <form action="{{route('grupostodos')}}">
                        <input type="text" name="busqueda">
                        <input type="submit" value="Buscar">
                    </form>
                    @if($busq)
                        Has buscado por: {{$busq}}
                    @endif
                    </div>
                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif
{{-- Hasta aquí esta cogido de app.blade.php --}}

                        <ol class="list-group list-group-numbered">

                            @foreach ($grupos as $grupo)

                                <li class="list-group-item d-flex justify-content-between align-items-start">

                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $grupo->name }} </div>
                                        <div>Participantes: {{ $grupo->participantes->count() }} - Importe: {{ $grupo->importe }} </div>
                                        Fecha del Sorteo: {{ $grupo->fechasorteo }}
                                    </div>

                                    <a href="{{ route('grupos.show', ["grupo" => $grupo->id]) }}" class="btn btn-info text-white m-3">Ver</a>
                                </li>

                            @endforeach
                        </ol>

                    </div>
                </div>
                {{ $grupos->links() }}
            </div>
        </div>
    </div>


@endsection
