@extends('adminlte::page')

@section('title', 'Editar Control Asientos')

@section('content_header')
    <h1>Editar Control Asiento</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Control Asiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('controlasientos.update', $controlAsiento->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('control-asiento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
