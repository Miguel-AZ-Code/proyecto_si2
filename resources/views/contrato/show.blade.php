@extends('adminlte::page')

@section('template_title')
    {{ $contrato->name ?? 'Show Contrato' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Contrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contratos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $contrato->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $contrato->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $contrato->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Presupuesto Id:</strong>
                            {{ $contrato->presupuesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Factura Id:</strong>
                            {{ $contrato->factura_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
