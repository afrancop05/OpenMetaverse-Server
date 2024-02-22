@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Interpretar datos de UserController.verContenido -->
            <h1>Contenido de OpenMetaverse</h1>
            <br>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-secondary">
                        <th>Propietario</th>
                        <th>Tipo</th>
                        <th>Archivo</th>
                        <th>Visibilidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alfonso</td>
                        <td>Avatar</td>
                        <td>ejemplo12.xml</td>
                        <td><input type="button" value="publico"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection