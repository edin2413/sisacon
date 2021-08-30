@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoria') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    {{ __('Crear Categoria') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="categorias" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoria->descripcion_categoria }}</td>

                                            <td>
                                                {{--  <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">  --}}
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categorias.show',$categoria->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{--  @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>  --}}
                                                {{--  </form>  --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categorias->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link href="{{ asset('lib/datatables.1.10.25/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">  
    @stop
    
    @section('js')
    <script src="{{ asset('lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#categorias').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: '{{asset('lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json')}}'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
    @stop
