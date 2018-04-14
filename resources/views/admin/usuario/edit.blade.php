@extends('layouts.admin')

@section('content')
    <div class="page dashboard-page">
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Usuario</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Rellene los campos</div>

                    <div class="panel-body">
                        {{ Form::model($usuario, array('action' => array('Admin\UsuarioController@update', $usuario->id), 'method' => 'PUT')) }}
                        <div class="boxs-body">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name"
                                           value="{{ $usuario->name }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="username" class="form-label">
                                        Usuario
                                    </label>
                                    <input type="text" name="username" id="username"
                                           value="{{ $usuario->username }}"
                                           class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="rol" class="form-label">
                                        Rol
                                    </label>
                                    <select name="rol" class="form-control" id="rol" required>
                                        @foreach (\App\Models\User::getRoles() as $k=>$v)
                                            <option value="{{ $k }}"
                                                    {{ $k == $usuario->rol ? 'selected' : '' }}>
                                                {{ $v }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label for="password" class="form-label">
                                        Contraseña
                                    </label>
                                    <input type="password" name="password" id="password"
                                           placeholder="Déjalo en blanco si no aplica"
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