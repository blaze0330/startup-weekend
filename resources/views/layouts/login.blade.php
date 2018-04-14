<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIOSAD</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/vendor/animate.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/vendor/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendor/morphingsearch.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css">
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.js"></script>
<script src="assets/bundles/libscripts.bundle.js"></script>

<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/js/vendor/d3/d3.min.js"></script>
<script src="assets/js/vendor/d3/d3.layout.min.js"></script>

<script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script src="assets/bundles/flotscripts.bundle.js"></script>

<!--<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->

<script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/vendor/summernote/summernote.min.js"></script>

<script src="assets/bundles/coolclockscripts.bundle.js"></script>

<!--/ vendor javascripts -->

<script src="assets/js/vendor/morphingsearch/morphingsearch.js"></script>

<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>

<script src="assets/js/main.js"></script>
</body>
</html>
