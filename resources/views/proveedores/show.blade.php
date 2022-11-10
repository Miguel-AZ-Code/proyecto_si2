@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{-- {{ __('Proveedores') }} --}}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('admin.proveedores.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('back') }}
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $proveedore->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $proveedore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $proveedore->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
