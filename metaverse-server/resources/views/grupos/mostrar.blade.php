@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-info-subtle">
                    <a href="{{ route("home") }}" type="button" class="btn btn-info text-white">Volver</a>

                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                </div>
                <div class="ms-2">
                <x-tarjetagrupo :grupo="$grupo" :botonver=false/>
                </div>

                <div class="card-body">
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-info-subtle" scope="col">Acción</th>
                                        <th class="bg-info-subtle" scope="col">Amigo</th>
                                        <th class="bg-info-subtle" scope="col">Regala a</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grupo->participantes as $amigo)
                                        <tr>
                                            <td>
                                                @if ($grupo->estado == 0)
                                                    <!--- Si es él puede borrarse o si es el admin echar a cualquiera -->
                                                    @if (($amigo->id == auth()->user()->id) || ($grupo->propietario_id == auth()->user()->id))
                                                        <form action="{{ route('grupos.participantes.destroy', ["grupo" => $grupo->id, "participante" => $amigo->id]) }}" method="post">
                                                            @csrf
                                                            @method("delete")
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($amigo->id == $grupo->propietario_id)
                                                    <i class="bi bi-person-lock"></i>&nbsp;{{ $amigo->name }}
                                                @else
                                                    {{ $amigo->name }}
                                                @endif
                                            </td>

                                            <td>
                                                @if (($grupo->estado > 0) && (($amigo->id == auth()->user()->id) || ($grupo->propietario_id == auth()->user()->id)))
                                                {{ \App\Models\User::find($amigo->pivot->amigo_id)->name }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @if(($grupo->estado == 0) && ($grupo->propietario_id == auth()->user()->id)) {{--Añadir comprobacion igual a fecha de sorteo--}}
                            <a href="{{ route('grupos.sortear', ["grupoid" => $grupo->id]) }}" class="link-info link-offset-2">Sortear</a>
                        @endif
                        @if(($grupo->estado == 1) && ($grupo->propietario_id == auth()->user()->id))
                            <a href="{{ route('grupos.anularsorteo', ["grupoid" => $grupo->id]) }}" class="link-info link-offset-2">Anular Sorteo</a>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
