@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info-subtle">
                    <a href="{{ route("grupos.create") }}" type="button" class="btn btn-info text-white">Crear</a>
                    <a href="{{ route("amigos.create") }}" type="button" class="btn btn-info text-white">Unirse</a>
                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                        <div class="row">


                            @if(count(auth()->user()->grupos) > 0)
                                @foreach(auth()->user()->grupos as $grupo)
                                    <x-tarjetagrupo :grupo="$grupo" :botonver="true" />
                                @endforeach
                            @else
                                <h4>No estas en un grupo</h4>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
