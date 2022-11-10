@extends('adminlte::page')

@section('title', 'Materiales')

@section('content')
    <br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
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
                        <form method="POST" action="{{ route('admin.materiales.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('materiales.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
