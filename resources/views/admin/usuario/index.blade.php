@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin/usuario/create') }}" class="pull-right btn btn-primary btn-raised">
                    <i class="glyphicon glyphicon-plus"></i> Nuevo Usuario
                </a>
                <h3>Usuarios</h3>
                <div class="clearfix"></div>
                @if (session()->has('message'))
                    <br>
                    <div class="alert alert-{{ session('tipo') }}" style="color: white;">
                        {!! session('message') !!}
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Lista de Usuarios</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr id="trid_{{ $usuario->id }}">
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->username }}</td>
                                        <td>{{ $usuario->direccion ? $usuario->direccion->nombre : 'Sin asignar' }}</td>
                                        <td>
                                            <a href="{{ url('/admin/usuario/'.$usuario->id.'/edit') }}"
                                               class="btn btn-success btn-sm btn-raised" title="Editar"
                                               data-toggle="tooltip">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <div onclick="confirmDelete({{ $usuario->id }}, 'Usuario', '{{ url("/admin/usuario") }}')"
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
                                <th>Usuario</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                                </tfoot>
                            </table>
                            {{ $usuarios->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
