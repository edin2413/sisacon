@extends('adminlte::page')

@section('title', 'Crear Empresa')

@section('content_header')
    <h1>Crear Empresa</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Empresa</span>
                        <input type="hidden" id="crearEmpresa" value="1">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empresas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empresa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
