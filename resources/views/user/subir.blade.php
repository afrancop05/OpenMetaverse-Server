@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Subir Contenido</h1>
            <br>
            <form action="{{ route('subir.contenido') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tipo" class="label">Tipo</label>
                    <!-- La opcion seleccionada se tiene que guardar en type_id de la tabla contents por su ID -->
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="artefacto">Artefacto</option>
                        <option value="avatar">Avatar</option>
                        <option value="mundo">Mundo</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="archivo" class="label">Archivo:</label>
                    <input type="file" name="archivo" id="archivo" required="" accept=".xml,.mvml" class="form-control">
                </div>  

                <br>
                <button type="submit" class="btn btn-light">Subir Contenido</button>
            </form>

        </div>
    </div>
</div>
@endsection