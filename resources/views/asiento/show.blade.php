@extends('layouts.app')

@section('template_title')
    {{ $asiento->name ?? 'Show Asiento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Asiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asientos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $asiento->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $asiento->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $asiento->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
