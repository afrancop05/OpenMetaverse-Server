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
                        <li><a href="#" onclick="updateTable('Linux')" class="btn btn-outline-light">Linux</a></li>
                        <li><a href="#" onclick="updateTable('Windows')" class="btn btn-outline-light">Windows</a></li>
                    </ul>
                </div>

                <table id="client-table">
                    <thead>
                        <tr>
                            <th>Cliente OMV</th>
                            <th>Tamaño Fichero</th>
                            <th>Enlace de Descarga</th>
                        </tr>
                    </thead>
                    <tbody id="client-table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection