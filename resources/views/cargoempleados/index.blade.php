@extends('adminlte::page')

@section('title', 'Contratos')

@section('content_header')
    <h1>Lista de contratos</h1>
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
                                {{-- {{ __('Cargoempleado') }} --}}
                            </span>

                            @can('admin.contratos.create')
                                <div class="float-right">
                                    <a href="{{ route('admin.contratos.create') }}" class="btn btn-success btn-sm float-right"
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
                            <table id="contratos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Persona</th>
                                        <th>Cargo</th>
                                        <th>Sueldo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cargoempleados as $cargoempleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $cargoempleado->fecha_inicio }}</td>
                                            <td>{{ $cargoempleado->fecha_fin }}</td>
                                            <td>
                                                @foreach ($personas as $persona)
                                                    @if ($persona->id == $cargoempleado->persona_id)
                                                        {{ $persona->nombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($cargos as $cargo)
                                                    @if ($cargo->id == $cargoempleado->cargo_id)
                                                        {{ $cargo->nombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $cargoempleado->sueldo }}</td>

                                            <td width="10px">
                                                <form action="{{ route('admin.contratos.destroy', $cargoempleado->id) }}"
                                                    method="POST">
                                                    @can('admin.contratos.show')
                                                        <a class="btn btn-sm btn-dark"
                                                            href="{{ route('admin.contratos.show', $cargoempleado->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('admin.contratos.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.contratos.edit', $cargoempleado->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('admin.contratos.destroy')
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
                {{-- {!! $cargoempleados->links() !!} --}}
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
        $('#contratos').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
