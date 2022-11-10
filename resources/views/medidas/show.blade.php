@extends('adminlte::page')

@section('title', 'Medida')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __(' lista de Medida') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.medidas.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Unidad:</strong>
                            {{ $medidas->unidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
