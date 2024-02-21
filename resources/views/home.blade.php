@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h1>Contenido de OpenMetaverse</h1>
                <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th>Propietario</th>
                                <th>Tipo</th>
                                <th>Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ale</td>
                                <td>Mundo</td>
                                <td>ejemplo1.xml</td>
                            </tr>
                            <tr>
                                <td>Pepe</td>
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
