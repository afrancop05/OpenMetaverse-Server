@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info-subtle">{{ __('Crear un Grupo') }}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route("grupos.store") }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Nombre del grupo:</label>
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="Nombre del Grupo" type="text" class="form-control" value="{{ old("name") }}">
                                        <br>
                                    </div>
                                    @if ($errors->has("name"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("name") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="importe" class="col-4 col-form-label">Importe:</label>
                                    <div class="col-8">
                                        <input id="importe" name="importe" placeholder="Valor aprox del regalo" type="text" class="form-control" value="{{ $valores["importe"] }}">
                                        <br>
                                    </div>
                                    @if ($errors->has("importe"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("importe") as $error1)
                                            {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <span class="input-group-text">Sorteo</span>
                                        <input id="fechasorteo" name="fechasorteo" placeholder="Fecha del Sorteo" type="date" class="form-control" value="{{ $valores["fechasorteo"] }}">
                                        <span class="input-group-text">Entrega de regalos</span>
                                        <input id="fechaentregaregalos" name="fechaentregaregalos" placeholder="fecha de entrega de los regalos" type="date" class="form-control" value="{{ $valores["fechaentregaregalos"] }}">
                                    </div>
                                    @if ($errors->has("fechasorteo"))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get("fechasorteo") as $error1)
                                        {{ $error1 }}
                                        @endforeach
                                    </div>
                                    @endif
                                    @if ($errors->has("fechaentregaregalos"))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get("fechaentregaregalos") as $error1)
                                        {{ $error1 }}
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="comentario">Comentario:</label>
                                    <div class="col-8">
                                        <textarea id="comentario" name="comentario" cols="40" rows="6" class="form-control">{{ old("comentario") }}</textarea>
                                    </div>
                                    @if ($errors->has("comentario"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("comentario") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <br>
                                        <button type="submit" class="btn btn-outline-info">Crear</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
