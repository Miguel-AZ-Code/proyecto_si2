<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('empleado') }}
            {{ Form::select('empleado_id', $empleados, $contrato->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente') }}
            {{ Form::select('cliente_id', $clientes, $contrato->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proyecto') }}
            {{ Form::select('proyecto_id', $proyectos, $contrato->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('presupuesto_id') }}
            {{ Form::select('presupuesto_id', $presupuestos, $contrato->presupuesto_id, ['class' => 'form-control' . ($errors->has('presupuesto_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('presupuesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('factura') }}
            {{ Form::select('factura_id', $facturas, $contrato->factura_id, ['class' => 'form-control' . ($errors->has('factura_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('factura_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $contrato->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
