<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('empleado') }}
            {{ Form::select('empleado_id', $empleados, $entrada->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedore') }}
            {{ Form::select('proveedore_id', $proveedores, $entrada->proveedore_id, ['class' => 'form-control' . ($errors->has('proveedore_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('proveedore_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materiales') }}
            {{ Form::select('materiales[]', $materiales, null, ['class' => 'form-control select2' . ($errors->has('materiales') ? ' is-invalid' : ''), 'multiple required']) }}
            {!! $errors->first('materiales', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $entrada->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $entrada->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
