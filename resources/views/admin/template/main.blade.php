<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gestor Dircon">
    <meta name="author" content="Stratia Consultores">
    <title> @yield('title','Default') | DIRCON</title>
    <link href="{{ asset('public/pluings/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/pluings/editable/css/bootstrap-editable.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/color.css') }}" rel="stylesheet"  >
    <link href="{{ asset('public/pluings/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/pluings/datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('public/pluings/alertify/css/alertify.css') }}" rel="stylesheet" >
    <link href="{{ asset('public/pluings/alertify/css/default.css') }}" rel="stylesheet" >
    
</head>

<body>
    <div id="wrapper">
        @include('admin.template.partials.nav')
            <!-- CONTENIDO PRINCIPAL -->
            <div id="page-wrapper">
                <span class="glyphicon glyphicon-menu-hamburger move-menu"></span>
                    @include('admin.template.partials.errors')
                <div class="row">

                    <div class="col-md-12 col-xs-12 col-lg-12">
                     @yield('content')


                    </div>
                </div><!-- /icons example -->
            </div> <!-- /CONTENIDO PRINCIPAL -->
    </div><!-- /#wrapper -->
    <script src="{{asset('public/pluings/jquery/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('public/pluings/datatable/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('public/pluings/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/pluings/editable/js/bootstrap-editable.min.js')}}"></script>
    <script src="{{asset('public/pluings/editable/js/moment.js')}}"></script>
    <script src="{{asset('public/pluings/editable/js/moment-español.js')}}"></script>
    <script src="{{asset('public/pluings/datatable/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/pluings/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/pluings/alertify/js/alertify.js')}}"></script>
    <script src="{{asset('public/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    @yield('js')


</body>

</html>
