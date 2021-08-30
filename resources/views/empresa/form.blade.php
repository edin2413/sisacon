<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $empresa->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $empresa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $empresa->descripcion_empresa, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capital_base') }}
            {{ Form::text('capital_base', $empresa->capital_base, ['class' => 'form-control' . ($errors->has('capital_base') ? ' is-invalid' : ''), 'placeholder' => 'Capital Base']) }}
            {!! $errors->first('capital_base', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capital_actual') }}
            {{ Form::text('capital_actual', $empresa->capital_actual, ['class' => 'form-control' . ($errors->has('capital_actual') ? ' is-invalid' : ''), 'placeholder' => 'Capital Actual', 'disabled']) }}
            <input type="hidden" id="capital_actual_" name="capital_actual_" value="">
            {!! $errors->first('capital_actual_', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div id="agregado" style="display: none;">
            <div class="form-group">
                {{ Form::label('capital_actual + agregado') }}
                <input type="text" id="capital_actual_add" name="capital_actual_add" class="form-control" disabled>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-primary" href="{{ route('empresas.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras  </a>
        <button type="submit" class="btn btn-primary"> <i class="fa fa-fw fa-save"></i>  Guardar</button></button>

    </div>
</div>


@section('js')
    <script src="{{ asset('lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 

    <script>
        
        $(document).ready(function(){
            $("#capital_base").keyup(function(){
                
                editarEmpresa=$("#editarEmpresa").val();
                crearEmpresa=$("#crearEmpresa").val();

                if(crearEmpresa==1){
                    //alert("crear")
                    $("#agregado").hide();
                    
                    capital_base=$("#capital_base").val();
                    $("#capital_actual").val(capital_base);
                    $("#capital_actual_").val(capital_base);

                    
                    
                }
                else if(editarEmpresa==1){
                    //$("#agregado").innerHTML;

                    $("#agregado").show();
                    //alert("editar")
                    capital_base=$("#capital_base").val();
                    capital_actual=$("#capital_actual").val();
                    
                    total=0;
                                        
                    total= parseFloat(capital_base) + parseFloat(capital_actual);
                    valor = parseFloat(total).toFixed(2);
                    //alert(valor);
                    //$("#capital_actual").val(valor);
                    //$("#capital_actual_").val(valor);
                    $("#capital_actual_add").val(valor);
                    $("#capital_actual_").val(valor);
                }
                else{
                    $("#agregado").hide();
                    $("#capital_actual_add").val(capital_actual);
                }

            });
            
            //alert(crearEmpresa+'+'+editarEmpresa);
            
            

            
        });
        
    </script>
@stop