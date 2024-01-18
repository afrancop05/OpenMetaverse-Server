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
                    <div class="card-header bg-info-subtle">{{ "Lista de Usuarios" }}

                    <form action="{{route('usuariostodos')}}">
                        <input type="text" name="busqueda">
                        <input type="submit" value="Buscar">
                    </form>
                        @if($busq)
                            Has buscado por: {{$busq}}
                        @endif

                    </div>

                    <div class="card-body">
{{-- Hasta aquí esta cogido de app.blade.php --}}

                        {{--
                        PONLO TÚ BONITO CON Bootstrap
                        https://getbootstrap.com/docs/5.2/getting-started/introduction/
                        --}}
                        <ol class="list-group list-group-numbered">

                            @foreach ($usuarios as $usuario)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $usuario->name }}</div>
                                        {{ $usuario->email }}
                                    </div>
                                    <span class="badge bg-info rounded-pill m-1">
                                        {{ $usuario->getRoleNames()[0] }}
                                    </span>
                                    <a href="{{ route("rolusuario", $usuario->id) }}" class="me-1 p-1 text-dark">
                                        <span class="material-icons">manage_accounts</span>
                                    </a>
                                    <a href="{{ route("borrarusuario", $usuario->id) }}" type="button" class="btn btn-sm rounded-2 btn-danger p-1">Borrar</a>

                                </li>

                            @endforeach
                        </ol>

                    </div>
                </div>
                            {{ $usuarios->links() }}
            </div>
        </div>
    </div>
@endsection
