@extends('adminlte::page')

@section('template_title')
    {{ $documento->name ?? 'Show Documento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Documento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('documentos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $documento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $documento->url }}
                        </div>
                        <div class="form-group">
                            <strong>Contrato Id:</strong>
                            {{ $documento->contrato_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
