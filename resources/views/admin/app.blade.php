<!DOCTYPE html>
<html lang="en" ng-app="Jobs">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>Admin - @yield('title', 'Dashboard')</title>

    <link href="{{ asset('/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/admin/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

        var base_url = "{{ url('/admin') }}";

    </script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    @include('_partials.admin.header')

    @include('_partials.admin.main_sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('content_header')
            </h1>
        </section>

        <section class="content">
            {!! Notification::showAll() !!}
            @yield('content')
        </section>
    </div>

    <footer class="main-footer clearfix">
        <div class="pull-right">
           
        </div>
    </footer>
</div>

<script src="{{ asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app.js') }}" type="text/javascript"></script>

@yield('bottom_scripts')

</body>
</html>
