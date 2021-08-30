<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion_categoria') }}
            {{ Form::text('descripcion_categoria', $categoria->descripcion_categoria, ['class' => 'form-control' . ($errors->has('descripcion_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Categoria']) }}
            {!! $errors->first('descripcion_categoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-primary" href="{{ route('categorias.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        <button type="submit" class="btn btn-primary"> <i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>
</div>