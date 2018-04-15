@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin/producto/create') }}" class="pull-right btn btn-primary btn-raised">
                    <i class="glyphicon glyphicon-plus"></i> Nuevo Producto
                </a>
                <h3>Productos</h3>
                <div class="clearfix"></div>
                @if (session()->has('message'))
                    <br>
                    <div class="alert alert-{{ session('tipo') }}" style="color: white;">
                        {!! session('message') !!}
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Lista de Productos</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($productos as $producto)
                                    <tr id="trid_{{ $producto->id }}">
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $producto->categoria->name }}</td>
                                        <td>{{ number_format($producto->price,2) }}</td>
                                        <td>
                                            <a href="{{ url('/admin/producto/'.$producto->id.'/edit') }}"
                                               class="btn btn-success btn-sm btn-raised" title="Editar"
                                               data-toggle="tooltip">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <div onclick="confirmDelete({{ $producto->id }}, 'Producto', '{{ url("/admin/producto") }}')"
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
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                                </tfoot>
                            </table>
                            {{ $productos->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
