@extends('adminlte::page')

@section('title', 'Materiales')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Materiale') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.materiales.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $materiales->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $materiales->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $materiales->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Medida:</strong>
                            {{ $materiales->medida->unidad }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $materiales->marca->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
