@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Editar Contenido</h1>
            <br>
            <form action="{{ route('actualizar.contenido', $contenido->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" value="{{ $contenido->type->type }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="archivo">Archivo:</label>
                    <input type="text" name="archivo" value="{{ $contenido->file }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="visibilidad">Visibilidad:</label>
                    <select name="visibilidad" class="form-control">
                        <option value="1" {{ $contenido->public ? 'selected' : '' }}>Público</option>
                        <option value="0" {{ !$contenido->public ? 'selected' : '' }}>Privado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection