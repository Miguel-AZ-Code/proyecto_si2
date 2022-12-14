@extends('adminlte::page')

@section('template_title')
    User
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

                                {{ __('USUARIOS') }}

                            </span>
                            <div class="float-right">
                            {{{Form::open(['route'=>'users.index','method'=>'GET','class'=>'form-inline pull-left']) }}}

                           @csrf
                            <div class="form-group">
                                {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            </div>
                            <hr>
                            &nbsp;
                            &nbsp;
                            <div class="form-group">
                                {{ Form::text('email',null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                            </div>
                          
                            &nbsp;
                            &nbsp;
                            {{-- <div class="form-group">
                                {{ Form::date('created_at',null, ['class' => 'form-control' . ($errors->has('created_at') ? ' is-invalid' : '')]) }}
                            </div> --}}
                            &nbsp;
                            &nbsp;
                            <div class="form-group">
 
                                <button type="submit" class="btn btn-danger btn-sm float-left"> PDF
                                   {{--  <span class="glyphicon glyphicon-search"></span> --}}
                                </button> 
                              
                            </div>

                            {{{ Form::close() }}}
                            </div>
                            @can('users.create')
                                <div class="float-right">

                                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>

                                </div>
                            @endcan

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usuarios" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Ci</th>
                                        <th>Name</th>
                                        <th>Telefono</th>
                                        <th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $user->ci }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @can('users.show')
                                                        <a class="btn btn-sm btn-dark "
                                                            href="{{ route('users.show', $user->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('users.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('users.edit', $user->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('users.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!}  pensaba redirigir del index al pdf (las vistas le voy a dar desde pdf y lo genero ahi
                no, lo que queria hacer es generar un pdf atravez de un filtrado en el index pero el index trabaja con su formulario 
               ya bro 
               gracias  estare todo el dia libre ya puej gracias bro  chau 
                )--}}
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#usuarios').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
