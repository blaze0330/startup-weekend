@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin/paquete/create') }}" class="pull-right btn btn-primary btn-raised">
                    <i class="glyphicon glyphicon-plus"></i> Nuevo Paquete
                </a>
                <h3>Paquete</h3>
                <div class="clearfix"></div>
                @if (session()->has('message'))
                    <br>
                    <div class="alert alert-{{ session('tipo') }}" style="color: white;">
                        {!! session('message') !!}
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Lista de Paquetes</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($paquetes as $paquete)
                                    <tr id="trid_{{ $paquete->id }}">
                                        <td>{{ $paquete->id }}</td>
                                        <td>{{ $paquete->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/paquete/'.$paquete->id.'/edit') }}"
                                               class="btn btn-success btn-sm btn-raised" title="Editar"
                                               data-toggle="tooltip">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <div onclick="confirmDelete({{ $paquete->id }}, 'Paquete', '{{ url("/admin/paquete") }}')"
                                                 class="btn btn-sm btn-danger btn-raised" title="Eliminar"
                                                 data-toggle="tooltip">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                </tfoot>
                            </table>
                            {{ $paquetes->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
