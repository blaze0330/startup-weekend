@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin/categoria/create') }}" class="pull-right btn btn-primary btn-raised">
                    <i class="glyphicon glyphicon-plus"></i> Nueva Categoría
                </a>
                <h3>Categorías</h3>
                <div class="clearfix"></div>
                @if (session()->has('message'))
                    <br>
                    <div class="alert alert-{{ session('tipo') }}" style="color: white;">
                        {!! session('message') !!}
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Lista de Categorías</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr id="trid_{{ $categoria->id }}">
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/categoria/'.$categoria->id.'/edit') }}"
                                               class="btn btn-success btn-sm btn-raised" title="Editar"
                                               data-toggle="tooltip">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <div onclick="confirmDelete({{ $categoria->id }}, 'Categoría', '{{ url("/admin/categoria") }}')"
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
                            {{ $categorias->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
