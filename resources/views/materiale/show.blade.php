@extends('adminlte::page')

@section('template_title')
    {{ $materiale->name ?? 'Show Materiale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Materiale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $materiale->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $materiale->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $materiale->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $materiale->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Medida Id:</strong>
                            {{ $materiale->medida_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
