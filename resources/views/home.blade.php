@extends('layouts.app')

@section('content')
<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                    <h1>DashBoard</h1>
                @endif
            @endauth
            @auth
                @if ((auth()->check()) && auth()->user()->hasRole('user'))
                    <h1>Contenido de OpenMetaverse</h1>
                @endif
            @endauth
            <br>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-secondary">
                        <th>Propietario</th>
                        <th>Tipo</th>
                        <th>Archivo</th>
                        @auth
                            @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                <th>Visibilidad</th>
                            @endif
                        @endauth
                        <th>Creado en</th>
                        <th>Última Actualización</th>
                        @auth
                            @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                <th>Gestion</th>
                            @endif
                        @endauth
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $data)
                    <tr>
                        <td>{{ $data->owner->name }}</td> <!-- Suponiendo que hay una relación owner en el modelo Content -->
                        <td>{{ $data->type->type }}</td>
                        <td>{{ $data->file }}</td>
                        @auth
                            @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                <td><input type="button" value="{{ $data->public ? 'Público' : 'Privado' }}"></td>
                            @endif
                        @endauth
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        @auth
                            @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                                <td><input type="button" value="Borrar">
                                <input type="button" value="Editar "></td>
                            @endif
                        @endauth
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection