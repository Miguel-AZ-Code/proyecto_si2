@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar rol</span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('admin.roles.update', $role) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.roles.form')

                        </form> --}}
                        {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                            @include('role.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
