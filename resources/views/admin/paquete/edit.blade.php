@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Paquete</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::model($paquete, array('action' => array('Admin\PaqueteController@update', $paquete->id), 'method' => 'PUT', 'enctype'=>'multipart/form-data')) }}
                        <div class="boxs-body">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name"
                                           value="{{ $paquete->name }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="keywords" class="form-label">
                                        Palabras Clave (Separadas por un coma)
                                    </label>
                                    <input type="text" name="keywords" id="keywords"
                                           value="{{ $paquete->keywords }}"
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
                                              rows="10">{{ $paquete->description }}</textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="productos" class="form-label">
                                        Productos
                                    </label>
                                    <select name="productos[]" class="form-control select2" id="productos" multiple
                                            required>
                                        @foreach($productos as $producto)
                                            <option value="{{ $producto->id }}" {{ in_array($producto->id, $misProductos) ? 'selected': '' }}>
                                                {{ $producto->name }}
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
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection