@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info-subtle">{{ "Importar Usuarios" }}
                        
                        <form action="{{route('importarusuarios')}}">
                            <br>
                            <input type="file" name="upload" accept="application/vnd.ms-excel">
                            <input type="submit" value="Importar">
                        </form>
                        <br>
                        @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
