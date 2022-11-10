@extends('adminlte::page')

@section('title', 'Materiales')
@section('content_header')
    <h1>Lista de materiales</h1>
@stop

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Materiale') }} --}}
                            </span>

                            @can('admin.materiales.create')
                                <div class="float-right">
                                    <a href="{{ route('admin.materiales.create') }}" class="btn btn-success btn-sm float-right"
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
                            <table id="materiales" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Medida </th>
                                        <th>Marca </th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materiales as $materiale)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $materiale->nombre }}</td>
                                            <td>{{ $materiale->descripcion }}</td>
                                            <td>{{ $materiale->precio }}</td>
                                            <td>{{ $materiale->medida->unidad }}</td> {{-- si me salio xdxd --}}
                                            <td>{{ $materiale->marca->nombre }}</td>

                                            <td>
                                                <form action="{{ route('admin.materiales.destroy', $materiale->id) }}"
                                                    method="POST">
                                                    @can('admin.materiales.show')
                                                        <a class="btn btn-sm btn-dark "
                                                            href="{{ route('admin.materiales.show', $materiale->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('admin.materiales.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.materiales.edit', $materiale->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('admin.materiales.destroy')
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
                {!! $materiales->links() !!}
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
        $('#materiales').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
