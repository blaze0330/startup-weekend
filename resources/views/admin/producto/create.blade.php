@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Nuevo Producto</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::open(array('url' => url('/admin/producto'), 'enctype'=>'multipart/form-data')) }}
                        <div class="boxs-body">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name"
                                           value="{{ old('name') }}"
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
                                           value="{{ old('price') }}"
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
                                              rows="10">{{ old('description') }}</textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="id_category" class="form-label">
                                        Categoría
                                    </label>
                                    <select name="id_category" class="form-control" id="id_category" required>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                    {{ $categoria->id == old('id_category') ? 'selected' : '' }}>
                                                {{ $categoria->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="image" class="form-label">
                                        Imagen
                                    </label>
                                    <input type="file" name="image" id="image"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{ Form::submit('Guardar', array('class' => 'btn btn-raised btn-primary ')) }}
                            <a href="{{ url('/admin/producto') }}" class="btn btn-raised btn-default">Cancelar</a>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
