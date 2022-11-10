@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

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
                                <a href="{{ route('admin.personas.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('BACK') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $persona->ci }}
                        </div>

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $persona->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $persona->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $persona->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $persona->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $persona->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $persona->fecha_nacimiento }}
                        </div>

                        <div class="form-group">
                            <strong>T C:</strong>
                            {{ $persona->T_C }}
                        </div>
                        <div class="form-group">
                            <strong>T E:</strong>
                            {{ $persona->T_E }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
