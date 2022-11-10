@extends('platform::dashboard')

@section('title', 'Medida')
@section('description', 'description')

@section('navbar')
    {{-- <div class="text-center">
        Navbar
    </div> --}}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
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
                        <form method="POST" action="{{ route('admin.medidas.update', $medidas->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.medidas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="">
@endsection
