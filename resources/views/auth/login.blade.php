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
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                    <div class="card card-signup">
                        <form class="form" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="header header-primary text-center">
                                <h4>Ingresar</h4>
                            </div>
                            <div class="content">
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control underline-input" name="username"
                                           placeholder="Ingrese su Usuario"
                                           value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Ingrese su contraseña"
                                           class="form-control underline-input" name="password"
                                           value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Recordarme</label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-raised">Ingresar
                                    <div class="ripple-container"></div>
                                </button>
                                <a href="/register" class="btn btn-success btn-raised">Registro</a>
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