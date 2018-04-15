@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Producto</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::model($producto, array('action' => array('Admin\ProductoController@update', $producto->id), 'method' => 'PUT', 'enctype'=>'multipart/form-data')) }}
                        <div class="boxs-body">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name"
                                           value="{{ $producto->name }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="price" class="form-label">
                                        Precio
                                    </label>
                                    <input type="number" name="price" id="price" step="any"
                                           value="{{ $producto->price }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group is-empty">
                                    <label for="description" class="form-label">
                                        Descripción
                                    </label>
                                    <textarea name="description" id="description" cols="30" class="form-control"
                                              rows="10">{{ $producto->description }}</textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="id_category" class="form-label">
                                        Categoría
                                    </label>
                                    <select name="rol" class="form-control" id="id_category" required>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                    {{ $categoria->id == $producto->id_category ? 'selected' : '' }}>
                                                {{ $categoria->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="image" class="form-label">
                                        Imagen (Subirla en caso de reemplazar)
                                    </label>
                                    <input type="file" name="image" id="image"
                                           class="form-control">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{ Form::submit('Guardar', array('class' => 'btn btn-raised btn-primary ')) }}
                            <a href="{{ URL::previous()  }}" class="btn btn-raised btn-default">Cancelar</a>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection