@extends('adminlte::page')

@section('template_title')
    <H1> GENERAR PDF</H1>
@endsection

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">

                                {{ __('BUSQUEDA DE USUARIOS') }}

                            </span>

                          {{--   {{{Form::open(['route'=>'users.pdf','method'=>'GET','class'=>'form-inline pull-right']) }}}
                            @csrf
                            <div class="form-group">
                                {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            </div>
                            &nbsp;
                            <div class="form-group">
                                {{ Form::text('email',null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> GENERAR PDF
                                   {{--  <span class="glyphicon glyphicon-search"></span> --}
                                </button>
                            </div>
                            &nbsp;

                            {{{ Form::close() }}} --}}


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usuarios" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                       {{--  <th>No</th> --}}

                                        <th>Ci</th>
                                        <th>Name</th>
                                        <th>Telefono</th>
                                        <th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user )

                                        <tr>
                                          {{--   <td>{{ ++$i }}</td> --}}

                                            <td>{{ $user->ci }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('js')
   {{--  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#usuarios').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script> --}}
@endsection
