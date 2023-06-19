<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @role('admin')
            Admin &mdash;
        @else
            Guru &mdash;
        @endrole
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    <!-- CSS for this page only -->
    @stack('css')
    <!-- End CSS  -->
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-override.min.css">
    <link rel="stylesheet" id="theme-color" href="/assets/css/dark.min.css">
    <link rel="stylesheet" href="/vendor/jquery-ui/jquery-ui.min.css">
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('layouts.header')
        @include('layouts.nav')

        @yield('content')

        @include('layouts.settings')

        <div class="overlay action-toggle">
        </div>
    </div>
    <script src="/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="/vendor/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>

    <!-- js for this page only -->
    @yield('js')

    @stack('js')
    <!-- ======= -->
    <script src="/assets/js/main.js"></script>
    <script>
        Main.init()
    </script>
</body>

</html>
