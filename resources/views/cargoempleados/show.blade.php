@extends('adminlte::page')

@section('title', 'Contrato')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Cargoempleado') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.contratos.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="form-group">
                            <strong>Persona:</strong>
                            @foreach ($personas as $persona)
                                @if ($persona->id == $cargoempleado->persona_id)
                                    {{ $persona->nombre }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $cargoempleado->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $cargoempleado->fecha_fin }}
                        </div>

                        <div class="form-group">
                            <strong>Cargo:</strong>
                            @foreach ($cargos as $cargo)
                                @if ($cargo->id == $cargoempleado->cargo_id)
                                    {{ $cargo->nombre }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Sueldo:</strong>
                            {{ $cargoempleado->sueldo }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
