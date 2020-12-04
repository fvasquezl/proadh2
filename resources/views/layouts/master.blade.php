<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proadh2 | AdminSystem</title>

    <!-- Theme style -->
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbars.navs._navbar')
    <!-- /.navbar -->
    @include('layouts.navbars._sidebar')
    <!-- Main Sidebar Container -->

    <div class="content-wrapper">    <!-- Content Wrapper. Contains page content -->
    @include('layouts.navbars._wrapper')
    <!-- /.content-wrapper -->
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>

    @include('layouts.footers._footer')
</div>
<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

@stack('modals')
</body>
</html>
