@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Editar Contenido</h1>
            <br>
            <form action="{{ route('actualizar.contenido', ['id' => $contenido->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $contenido->id }}">

                <div class="form-group">
                    <label for="tipo" class="label">Tipo</label>
                    <!-- La opción seleccionada se guardará en type_id de la tabla contents por su ID -->
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="1" {{ $contenido->type_id == 1 ? 'selected' : '' }}>Artefacto</option>
                        <option value="2" {{ $contenido->type_id == 2 ? 'selected' : '' }}>Avatar</option>
                        <option value="3" {{ $contenido->type_id == 3 ? 'selected' : '' }}>Mundo</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="archivo" class="label">Archivo actual:</label>
                    <div>{{ $contenido->file }}</div>
                    <label for="archivo" class="label">Subir nuevo archivo:</label>
                    <input type="file" name="archivo" id="archivo" accept=".xml,.mvml" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="visibilidad" class="label">Visibilidad</label>
                    <!-- La visibilidad seleccionada se guardará en el campo public de la tabla contents -->
                    <select name="visibilidad" id="visibilidad" class="form-control">
                        <option value="1" {{ $contenido->public ? 'selected' : '' }}>Público</option>
                        <option value="0" {{ !$contenido->public ? 'selected' : '' }}>Privado</option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-light">Actualizar Contenido</button>
            </form>

        </div>
    </div>
</div>
@endsection