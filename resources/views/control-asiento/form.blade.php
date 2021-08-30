<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empresa') }}
            
            <select name="empresa_id" id="empresa_id" class="form-control selectpicker" data-live-search="true">
                <option value="">Seleccione</option>
                @foreach ($empresas as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->nombre}} </option>
                @endforeach

            </select>
            {!! $errors->first('empresa_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       
        <div class="form-group">
            {{ Form::label('categoria') }}
            <select name="categoria_id" id="categoria_id" class="form-control selectpicker" data-live-search="true">
                <option value="">Seleccione</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->descripcion_categoria}}</option>
                @endforeach
            </select>
            {{--  {{ Form::text('categoria_id', $controlAsiento->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}  --}}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $controlAsiento->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $controlAsiento->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $controlAsiento->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $controlAsiento->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'total', 'disabled']) }}

            {!! $errors->first('total', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="button" id="bt_add" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
    </div>

    <hr>
    
    <div class="table-responsive">
        <table id="detalles_asiento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <tfoot>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <h4 id="total_registro">$. 0.00</h4>
                    <input type="hidden" id="total_" name="total_" value="">
                </th>
                <th></th>
            </tfoot>
        </table>
    </div>
    <hr>
    

    <div class="box-footer mt20" id="guardar" style="display: none;">
        <a class="btn btn-primary" href="{{ route('controlasientos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
    </div>

</div>
    
@section('js')
    <script src="{{ asset('lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script>
        $(document).ready(function(){

            $("#bt_add").click(function(){
                agregar();
            });
            
            $("#precio").keyup(function(){
                precio=$("#precio").val();
                cantidad=$("#cantidad").val();
                total=0;
                
                if(precio!="" || cantidad!=""){
                    total=(cantidad*precio);
                    valor= parseFloat(total).toFixed(2);
                    //alert(valor);
                    //alert( $("#total_a").val(parseFloat(total).toFixed(2)) );
                    $("#total").val(valor);
                    //$("#total_").val(valor);
                }
            });

            $("#cantidad").keyup(function(){
                precio=$("#precio").val();
                cantidad=$("#cantidad").val();
                total=0;
                
                if(precio!="" || cantidad!=""){
                    total=(cantidad*precio);
                    valor= parseFloat(total).toFixed(2);
                    //alert(valor);
                    $("#total").val(valor);
                    //$("#total_").val(valor);
                }
            });

            
        });

        var cont=0;
        total_registro=0;
        numero_fila=0;
        subtotal=[];

        function agregar(){
            empresa_id=$("#empresa_id").val();
            categoria_id=$("#categoria_id").val();
            cantidad=$("#cantidad").val();
            descripcion=$("#descripcion").val();
            precio=$("#precio").val();
            total=$("#total").val();
            
            if (empresa_id!="" && categoria_id!="" && cantidad!="" && descripcion!="" && precio!=""){
                subtotal[cont]=(cantidad*precio);
                total_registro=total_registro+subtotal[cont];

                var fila='<tr class="selected" id="fila'+cont+'">'+
                            '<td>'+parseInt( eval(cont+1) )+' <input type="hidden" name="numero_fila_" value="'+parseInt( eval(cont+1) )+'"></td>'+
                            '<td><input type="hidden" name="descripcion_[]" value="'+descripcion+'">'+descripcion+'</td>'+
                            '<td><input type="hidden" name="cantidad_[]" value="'+cantidad+'">'+cantidad+'</td>'+
                            '<td><input type="hidden" name="precio_[]" value="'+precio+'">'+precio+'</td>'+
                            '<td><input type="hidden" name="subtotal_[]" value="'+subtotal[cont]+'"> '+subtotal[cont]+'</td>'+
                            '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-fw fa-trash"></i></button></td>'+
                         '</tr>';
                         cont++;

                         //alert(cont++);
                         limpiar();
                         $('#total_registro').html("$. "+ total_registro);
                         $('#total_').val(parseFloat(total_registro).toFixed(2));
                         //valor= parseFloat(total).toFixed(2);
                         evaluar();
                         $('#detalles_asiento').append(fila);
            }
            else{
                alert("Faltan campos por llenar");
            }
        }

        function eliminar(index){
            total_registro=total_registro-subtotal[index];
            $('#total_registro').html("$. "+ total_registro);
            $('#fila' + index).remove();
            evaluar();
        }

        function limpiar(){
            $("#cantidad").val("");
            $("#descripcion").val("");
            $("#precio").val("");
            $("#total").val("");
        }

        function evaluar(){
            if(total_registro > 0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }
        
        
        
    </script>
@stop