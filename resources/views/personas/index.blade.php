@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista del personal</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Persona') }}
                            </span>

                            @can('admin.personas.create')
                                <div class="float-right">
                                    <a href="{{ route('admin.personas.create') }}" class="btn btn-success btn-sm float-right"
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
                            <table id="personas" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        {{-- <th>No</th> --}}

                                        <th>CI</th>

                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Nit</th>
                                        <th>Tipo</th>
                                        <th>Fecha Nacimiento</th>

                                        <th>T C</th>
                                        <th>T E</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

                                            <td>{{ $persona->ci }}</td>

                                            <td>{{ $persona->nombre }}</td>
                                            <td>{{ $persona->telefono }}</td>
                                            <td>{{ $persona->direccion }}</td>
                                            <td>{{ $persona->nit }}</td>
                                            <td>{{ $persona->tipo }}</td>
                                            <td>{{ $persona->fecha_nacimiento }}</td>

                                            <td>{{ $persona->T_C }}</td>
                                            <td>{{ $persona->T_E }}</td>

                                            <td>
                                                <form action="{{ route('admin.personas.destroy', $persona->id) }}"
                                                    method="POST">
                                                    @can('admin.personas.show')
                                                        <a class="btn btn-sm btn-dark"
                                                            href="{{ route('admin.personas.show', $persona->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('admin.personas.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.personas.edit', $persona->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('admin.personas.destroy')
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
                {!! $personas->links() !!}
            </div>
        </div>
    </div>
@stop
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
        $('#personas').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
