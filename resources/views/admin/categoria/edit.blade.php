@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Categoría</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::model($categoria, array('action' => array('Admin\CategoriaController@update', $categoria->id), 'method' => 'PUT', 'enctype'=>'multipart/form-data')) }}
                        <div class="boxs-body">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name"
                                           value="{{ $categoria->name }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
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