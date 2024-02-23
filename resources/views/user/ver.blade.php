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

            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                    <h1>Contenido de OpenMetaverse</h1>
                @endif
            @endauth
            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('user'))
                    <h1>Contenido OpenMetaverse de {{ Auth::user()->name }}</h1>
                @endif
            @endauth
            <br>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-secondary">
                        <th>Tipo</th>
                        <th>Archivo</th>
                        <th>Visibilidad</th>
                        <th>Creado en</th>
                        <th>Última Actualización</th>
                        <th>Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $data)
                    <tr>
                        <!-- Suponiendo que hay una relación owner en el modelo Content -->
                        <td>{{ $data->type->type }}</td>
                        <td>{{ $data->file }}</td>
                        <td>
                            <form action="{{ route('cambiar.visibilidad', $data->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-{{ $data->public ? 'success' : 'danger' }}">
                                    {{ $data->public ? 'Público' : 'Privado' }}
                                </button>
                            </form>
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <form action="{{ route('borrar.contenido', $data->id) }}" method="GET">
                                @csrf
                                <button type="submit" >Borrar</button>
                            </form>
                            <input type="button" value="Editar ">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection