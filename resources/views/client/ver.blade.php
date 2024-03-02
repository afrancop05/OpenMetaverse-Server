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
            <div>
                <h1 id="titulo">Descargar Cliente</h1>
                <br>

                <div id="download-list">
                    <ul>
                        <li><a href="{{ route("descargar.linux") }}" class="btn btn-outline-light">Linux</a></li>
                        <li><a href="{{ route("descargar.win64") }}" class="btn btn-outline-light">Windows</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
