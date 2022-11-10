@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="col col-lg-7 mt-6 p-4">
        <h2 class="mt-2 text-dark fw-light">
            La herramienta de cálculo para constructores y profesionales
        </h2>
        <p>
            Plataforma digital para realizar tus propios cómputos, presupuestos en tiempo real y vincularte con clientes y
            comercios.
        </p>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
