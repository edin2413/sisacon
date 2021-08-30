@extends('layouts.app')

@section('template_title')
    Asiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Cantidad</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asientos as $asiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $asiento->descripcion }}</td>
											<td>{{ $asiento->cantidad }}</td>
											<td>{{ $asiento->precio }}</td>

                                            <td>
                                                <form action="{{ route('asientos.destroy',$asiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asientos.show',$asiento->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asientos.edit',$asiento->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asientos->links() !!}
            </div>
        </div>
    </div>
@endsection
