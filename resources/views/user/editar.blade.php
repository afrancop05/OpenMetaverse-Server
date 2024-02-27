@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <h1 id="titulo">Editar Contenido</h1>
                <h2 id="titulo">{{ $contenido->file }}</h2>
            </div>
            <br>
            <form action="{{ route('actualizar.contenido', ['id' => $contenido->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $contenido->id }}">

                <div class="form-group">
                    <label for="tipo" class="label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="1" {{ $contenido->type_id == 1 ? 'selected' : '' }}>Avatar</option>
                        <option value="2" {{ $contenido->type_id == 2 ? 'selected' : '' }}>Mundo</option>
                        <option value="3" {{ $contenido->type_id == 3 ? 'selected' : '' }}>Artefacto</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="archivo" class="label">Archivo</label>
                    <input type="file" name="archivo" id="archivo" accept=".xml,.mvml" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="visibilidad" class="label">Visibilidad</label>
                    <!-- La visibilidad seleccionada se guardará en el campo public de la tabla contents -->
                    <select name="visibilidad" id="visibilidad" class="form-control">
                        <option value="1" {{ $contenido->public ? 'selected' : '' }}>Público</option>
                        <option value="0" {{ !$contenido->public ? 'selected' : '' }}>Privado</option>
                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
