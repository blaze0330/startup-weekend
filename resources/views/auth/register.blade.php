<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>SexPrise</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <link href="{{ url('/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="signup-page">
<div class="wrapper">
    <div class="header header-filter"
         style="background-image: url('{{ url('/assets/images/login-bg.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center" style="margin-top: -90px">
                    <div class="card card-signup">
                        <form class="form" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="header header-primary text-center">
                                <h4>Registro</h4>
                            </div>
                            <div class="content">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" placeholder="Nombre"
                                           class="form-control underline-input" name="name"
                                           value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" placeholder="Correo Electrónico"
                                           class="form-control underline-input" name="email"
                                           value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control underline-input" name="username"
                                           placeholder="Usuario"
                                           value="{{ old('username') }}" required>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Contraseña"
                                           class="form-control underline-input" name="password"
                                           value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Confirmar Contraseña"
                                           class="form-control underline-input" name="password_confirmation"
                                           value="{{ old('password_confirmation') }}" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-raised">Registrarme
                                    <div class="ripple-container"></div>
                                </button>
                                <br>
                                <a href="/login" style="color: black">Ya tengo una cuenta</a>
                                <br>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="col-lg-12 text-center">
                    <div class="copyright">SexPrise &copy; {{ date('Y') }}</div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>

<script src="{{ url('/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ url('/assets/js/main.js') }}"></script>
</html>