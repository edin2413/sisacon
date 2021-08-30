@extends('adminlte::page')

@section('title', 'Crear Asiento')

@section('content_header')
    <h1>Crear Asiento</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Control Asiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('controlasientos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('control-asiento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
