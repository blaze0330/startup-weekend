<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title>SexPrise - Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="{{ url('/assets/images/favicon.ico') }}"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/vendor/morphingsearch.css') }}"/>
    <link href="{{ url('/assets/js/vendor/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url('/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/js/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}">

    <script src="{{ url('/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ url('/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ url('/assets/js/vendor/footable/footable.all.min.js') }}"></script>
    <script src="{{ url('/assets/js/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('/assets/js/main.js') }}"></script>
    <script src="{{ url('/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
</head>
<body id="oakleaf" class="main_Wrapper">
<div id="wrap" class="animsition">
    <!-- HEADER Content -->
    <section id="header">
        <header class="clearfix">
            <!-- Branding -->
            <div class="branding">
                <a class="brand" href="{{ url('/') }}">
                    <span>SexPrise</span>
                </a>
                <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <!-- Branding end -->

            <!-- Search -->
            <div id="morphsearch" class="morphsearch">
                <span class="morphsearch-close"></span>
            </div>
            <!-- /morphsearch -->
            <div class="overlay"></div>
            <!-- Search end -->

            <!-- Right-side navigation -->
            <ul class="nav-right pull-right list-inline">
                <li class="dropdown nav-profile">
                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('/assets/images/avatar4.png') }}"
                             alt="" class="0 size-30x30">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
                            <div class="user-info">
                                <div class="user-name">{{ Auth::user()->name }}</div>
                                <!--<div class="user-position online">Rol aquí</div>-->
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" role="button" tabindex="0"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right-side navigation end -->
        </header>
    </section>
    <!--/ HEADER Content  -->
    <!--  CONTROLS Content -->
    <div id="controls">
        <!--SIDEBAR Content -->
        <aside id="leftmenu">
            <div id="leftmenu-wrap">
                <div class="panel-group slim-scroll" role="tablist">
                    <div class="panel panel-default">
                        <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <!--  NAVIGATION Content -->
                                <ul id="navigation">
                                    @foreach(\App\MenuHandler::items() as $menu)
                                        @if (count($menu['submenus']) == 0)
                                            @if (isset($menu['rol']) && !in_array(Auth::user()->rol, $menu['rol']))
                                                @continue
                                            @endif
                                            <li class="{{ $menu['class'] }} {{ \App\MenuHandler::isActive($menu) ? 'active open' : '' }}">
                                                <a href="{{ url($menu['url']) }}">
                                                    <i class="{{ $menu['icon'] }}"></i>
                                                    <span>
                                                        {{ $menu['title'] }}
                                                    </span>
                                                </a>
                                            </li>
                                        @else
                                            @if (isset($menu['rol']) && !in_array(Auth::user()->rol, $menu['rol']))
                                                @continue
                                            @endif
                                            <li class="{{ $menu['class'] }} {{ \App\MenuHandler::isActive($menu) ? 'active open' : '' }}">
                                                <a role="button" tabindex="0">
                                                    <i class="{{ $menu['icon'] }}"></i>
                                                    <span>{{ $menu['title'] }}</span>
                                                </a>
                                                <ul style="{{ $menu['class'] }} {{ \App\MenuHandler::isActive($menu) ? 'display: block;' : '' }}">
                                                    @foreach($menu['submenus'] as $submenu)
                                                        @if (isset($submenu['rol']) && !in_array(Auth::user()->rol, $submenu['rol']))
                                                            @continue
                                                        @endif
                                                        @if (isset($submenu['submenus']) && count($submenu['submenus']) > 0)
                                                            <li class="{{ $submenu['class'] }} {{ \App\MenuHandler::isActive($submenu) ? 'active open' : '' }}">
                                                                <a role="button" tabindex="0">
                                                                    <i class="fa fa-angle-right"></i>
                                                                    <span>{{ $submenu['title'] }}</span>
                                                                </a>
                                                                <ul>
                                                                    @foreach($submenu['submenus'] as $smenu)
                                                                        @if (isset($smenu['rol']) && !in_array(Auth::user()->rol, $smenu['rol']))
                                                                            @continue
                                                                        @endif
                                                                        <li>
                                                                            <a href="{{ url($smenu['url']) }}">
                                                                                <span>{{ $smenu['title'] }}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li class="{{ \App\MenuHandler::isActive($submenu) ? 'active' : '' }}">
                                                                <a href="{{ url($submenu['url']) }}">
                                                                    <i class="fa fa-angle-right"></i>
                                                                    {{ $submenu['title'] }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <!--/ NAVIGATION Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--/ SIDEBAR Content -->
        <!--RIGHTBAR Content -->
        <aside id="rightmenu">
            <div role="tabpanel">
            </div>
        </aside>
        <!--/ RIGHTBAR Content -->
    </div>
    <!--/ CONTROLS Content -->
    <!-- CONTENT -->
    <section id="content">
        @yield('content')
    </section>
    <!--/ CONTENT -->
</div>
<!-- Estilos y scripts -->
<link rel="stylesheet" href="{{ url('/assets/js/vendor/footable/css/footable.core.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/js/vendor/sweetalert/sweetalert2.css') }}">

<script src="{{ url('/assets/bundles/sweetalertscripts.bundle.js') }}"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.footable').footable();
        $(".sel2").select2();
    });
</script>
<style>
    div#mceu_27 {
        display: none;
    }

    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }

    input[type="file"] {
        opacity: 1 !important;
        position: relative !important;
    }

    .modal-backdrop {
        display: none;
    }

    .modal.fade.in:before {
        background: rgba(0, 0, 0, 0.15);
        position: fixed;
        width: 100%;
        height: 100%;
        content: ' ';
        top: 0;
        left: 0;
    }

    #content .modal-dialog.modal-lg {
        left: 10%;
    }
</style>
</body>
</html>
