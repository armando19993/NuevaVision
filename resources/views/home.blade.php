@extends('layouts.app')

@section('contenido')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Panel de Administracion') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
@endsection
