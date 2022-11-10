@extends('adminlte::page')

@section('title', 'Notas')

@section('content_header')
    <h1>Lista de notas</h1>
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
                                {{-- {{ __('Nota') }} --}}
                            </span>

                            @can('admin.notas.create')
                                <div class="float-right">
                                    <a href="{{ route('admin.notas.create') }}" class="btn btn-success btn-sm float-right"
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
                            <table id="notas" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>
                                        <th>Empleado</th>
                                        <th>Proveedor</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notas as $nota)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $nota->tipo }}</td>
                                            <td>{{ $nota->descripcion }}</td>
                                            <td>{{ $nota->fecha }}</td>
                                            <td>{{ $nota->persona->nombre }}</td>
                                            <td>{{ $nota->proveedor->nombre }}</td>

                                            <td>
                                                <form action="{{ route('admin.notas.destroy', $nota->id) }}" method="POST">
                                                    @can('admin.notas.show')
                                                        <a class="btn btn-sm btn-dark "
                                                            href="{{ route('admin.notas.show', $nota->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('admin.notas.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.notas.edit', $nota->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('admin.notas.destroy')
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
                {{-- {!! $notas->links() !!} --}}
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
        $('#notas').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
