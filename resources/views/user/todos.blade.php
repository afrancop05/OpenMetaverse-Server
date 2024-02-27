@extends('layouts.app')

@section('content')
    <div class="contenido">
        <div class="row justify-content-center">
            <div class="col-12">

                <h1 id="titulo">Usuarios</h1>
                <br>
               <div style="text-align: center;">
                    <form action="{{ route('usuarios.todos') }}">
                        <input type="text" name="busqueda">
                        <input type="submit" value="Buscar" id="buscar">
                    </form>

                    <br>
                    @if($busq)
                        <p>Has buscado por: {{ $busq }}</p>
                    @endif
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Gestión</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('rolusuario', $usuario->id) }}" class="me-1 p-1 text-dark">
                                    {{ $usuario->getRoleNames()[0] }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('borrarusuario', $usuario->id) }}" type="button" class="btn btn-sm rounded-2 btn-outline-danger"><i class='bx bxs-trash' ></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center text-dark py-2">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection