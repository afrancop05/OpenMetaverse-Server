@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: purple; color: white;">Contenido de {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th>Tipo</th>
                                <th>Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mundo</td>
                                <td>ejemplo1.xml</td>
                            </tr>
                            <tr>
                                <td>Artefacto</td>
                                <td>ejemplo2.xml</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
