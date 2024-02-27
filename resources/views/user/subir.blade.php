@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1 id="titulo">Subir Contenido</h1>
            <br>
            <form action="{{ route('subir.contenido') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tipo" class="label">Tipo</label>
                    <!-- La opcion seleccionada se tiene que guardar en type_id de la tabla contents por su ID -->
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="1">Avatar</option>
                        <option value="2">Mundo</option>
                        <option value="3">Artefacto</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="archivo" class="label">Archivo</label>
                    <input type="file" name="archivo" id="archivo" required="" accept=".xml,.mvml" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="visibilidad" class="label">Visibilidad</label>
                    <!-- La visibilidad seleccionada se guardará en el campo public de la tabla contents -->
                    <select name="visibilidad" id="visibilidad" class="form-control">
                        <option value="1">Público</option>
                        <option value="0">Privado</option>
                    </select>
                </div>

                <br>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Subir <i class='bx bx-upload'></i></button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
