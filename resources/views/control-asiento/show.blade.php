@extends('adminlte::page')

@section('title')
{{ $controlAsiento->name ?? 'Mostrar Control Asiento' }}
@stop
@section('content_header')
    <h1>Control de Asiento</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 id="nombre_empresa_"></h4>
                            
                                
                            
                            
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('controlasientos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="detalles_asiento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion Detalle</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($controlAsiento as $item)
                                        <tr>
                                            <td>{{ ++$i }} <input type="hidden" id="nombre_empresa" value="{{ $item->nombre }}"></td>
                                            
											<td>{{ $item->descripcion_detalle }}</td>
											<td>{{ $item->cantidad }}</td>
											<td>{{ $item->precio }}</td>
											<td>{{ $item->total_detalle }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link href="{{ asset('lib/datatables.1.10.25/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">  
@stop
    
@section('js')
    <script src="{{ asset('lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#detalles_asiento').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: '{{ asset('lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json')}}'
                },
            });
        } );
    </script>
    <script>
        $(document).ready(function(){
            nombre_empresa=$("#nombre_empresa").val();
            $('#nombre_empresa_').html('Empresa: '+nombre_empresa);
        });
    </script>
@stop


