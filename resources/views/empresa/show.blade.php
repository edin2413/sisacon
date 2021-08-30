@extends('adminlte::page')

@section('title')
{{ $empresa->name ?? 'Ver Empresa' }}
@stop
@section('content_header')
    <h1>Ver Empresas</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $empresa->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empresa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $empresa->descripcion_empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Capital Base:</strong>
                            {{ $empresa->capital_base }}
                        </div>
                        <div class="form-group">
                            <strong>Capital Actual:</strong>
                            {{ $empresa->capital_actual }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
