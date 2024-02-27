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
                    <h1 id="titulo">Contenido de OpenMetaverse</h1>
                @endif
            @endauth
            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('user'))
                    <h1 id="titulo">Contenido OpenMetaverse de {{ Auth::user()->name }}</h1>
                @endif
            @endauth
            <br>
            <table>
                <thead>
                    <tr>
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
                                <button type="submit" class="btn btn-outline-{{ $data->public ? 'success' : 'danger' }} py-1">
                                    {{ $data->public ? 'Público' : 'Privado' }}
                                </button>
                            </form>
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td style="display: flex; align-items: center;">
                            <form action="{{ route('editar.contenido', $data->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary py-1"><i class='bx bx-edit' ></i></button>
                            </form>
                            <div style="margin-left: 5px;"></div>
                            <form action="{{ route('borrar.contenido', $data->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger py-1"><i class='bx bxs-trash' ></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
