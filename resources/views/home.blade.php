@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard CJP TELECOM</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesión, ahora puedes: 
                    <a href="{{ route('crear-dispositivo') }}" class="btn btn-primary">Crear Dispositivo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
