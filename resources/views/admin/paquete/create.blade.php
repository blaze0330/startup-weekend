@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Nuevo Paquete</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::open(array('url' => url('/admin/paquete'), 'enctype'=>'multipart/form-data')) }}
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
                                    <label for="keywords" class="form-label">
                                        Palabras Clave (Separadas por un coma)
                                    </label>
                                    <input type="text" name="keywords" id="keywords"
                                           value="{{ old('keywords') }}"
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
                                    <label for="productos" class="form-label">
                                        Productos
                                    </label>
                                    <select name="productos[]" class="form-control select2" id="productos" multiple
                                            required>
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}">
                                                {{ $producto->name }}
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
                            <a href="{{ url('/admin/paquete') }}" class="btn btn-raised btn-default">Cancelar</a>
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
