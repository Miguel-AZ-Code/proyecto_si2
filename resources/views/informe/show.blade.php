@extends('adminlte::page')

@section('template_title')
    {{ $informe->name ?? 'Show Informe' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Informe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('informes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $informe->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $informe->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $informe->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
