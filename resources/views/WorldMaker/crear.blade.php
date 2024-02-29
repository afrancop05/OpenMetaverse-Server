@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1 id="titulo">Crear Mundo</h1>
            <br>
            <form action="{{ route('crear.mundo') }}" method="POST" enctype="multipart/form-data"> {{-- Ruta al completar el formulario --}}
                @csrf

                <div class="form-group">
                    <label for="author" class="label">Autor </label>
                    {{-- Cambiar el value por el autor que viene por el controlador --}}
                    <input type="text" value="Autor controlador" id="author" readonly class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="name" class="label">Nombre</label>
                    <input type="text" name="name" id="name" required="" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="descripcion" class="label">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="tamanio" class="label">Tamaño del Mundo</label>
                    <input type="number" name="tamanio" id="tamanio" min="1" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="forma" class="label">Forma</label>
                    <select name="forma" id="forma" class="form-control">
                        <option value="1">Capsula</option>
                        <option value="2">Cilindro</option>
                        <option value="3">Cubo</option>
                        <option value="4">Esfera</option>
                    </select>
                </div>
                <br>
                
                <div class="form-group">
                    <label for="tamanioforma" class="label">Tamaño de la Forma</label>
                    <input type="number" name="tamanioforma" id="tamanioforma" min="1" class="form-control">
                </div>
                <br>
                
                <div class="form-group">
                    <label for="sombraluz" class="label">Sombra de Luz</label>
                    <select name="sombraluz" id="sombraluz" class="form-control">
                        <option value="1">Ninguna</option>
                        <option value="2">Dura</option>
                        <option value="3">Suavizada</option>
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label for="dirluz" class="label">Dirección de Luz</label>
                    <input type="number" name="dirluz" id="dirluz" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="colorluz" class="label">Color de Luz</label>
                    <input type="color" value="#FFFFFF" name="colorluz" id="colorluz" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label for="visibilidad" class="label">Visibilidad</label>
                    <select name="visibilidad" id="visibilidad" class="form-control">
                        <option value="1">Público</option>
                        <option value="0">Privado</option>
                    </select>
                </div>
                <br>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Crear <i class='bx bx-world'></i></button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection