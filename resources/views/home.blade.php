@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                    <h1>Contenido de OpenMetaverse</h1>
                @endif
            @endauth
            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('user'))
                    <h1>Contenido OpenMetaverse de {{ Auth::user()->name }}</h1>
                @endif
            @endauth
            <br>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="table-secondary">
                            @auth
                                @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                    <th>Propietario</th>
                                @endif
                            @endauth
                            <th>Tipo</th>
                            <th>Archivo</th>
                            <th>Visibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @auth
                                @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                    <td>Ale</td>
                                @endif
                            @endauth
                            <td>Mundo</td>
                            <td>ejemplo1.xml</td>
                            <td><input type="button" value="privado"></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
