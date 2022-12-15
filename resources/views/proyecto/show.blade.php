@extends('adminlte::page')

@section('template_title')
    {{ $proyecto->name ?? 'Show Proyecto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proyecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion:</strong>
                            {{ $proyecto->ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $proyecto->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $proyecto->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proyecto->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $proyecto->empleado_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
