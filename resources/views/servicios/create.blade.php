@extends('adminlte::page')

@section('title', 'Servicio')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Servicio') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.servicios.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.servicios.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('servicios.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
