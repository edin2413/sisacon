@extends('adminlte::page')

@section('title')
    {{ $categoria->name ?? 'Mostrar Categoria' }}
@stop

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoria->descripcion_categoria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
