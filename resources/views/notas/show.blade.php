@extends('adminlte::page')

@section('title', 'Notas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Persona') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.notas.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('BACK') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $nota->persona->nombre }}
                        </div>


                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $nota->fecha }}
                        </div>

                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $nota->proveedor->nombre }}
                        </div>


                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $nota->descripcion }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
