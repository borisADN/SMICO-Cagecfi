<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>SMICO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    {{-- Cette partie sera personalisable! --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/personnalisation/favicon.png') }}">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.slim.min.js') }}"></script> --}}

    <!-- swiper css -->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    
    <!-- Icons Css -->
    <!-- CDN Font Awesome -->
    <link href="{{ asset('assets/css/boxicons.min.css') }}"  rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link href="{{ asset('assets/css/materialdesignicons.css') }}"  rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/customisation.css') }}">

     <!-- alertifyjs Css -->
     <link href="{{ asset('assets/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>


<body data-layout="horizontal" data-topbar="dark">
    <div id="layout-wrapper">

        {{-- Le contenu de la page sera affiché ici --}}
        @yield('content')


    </div>
    
    <!-- Bootstrap Bundle (inclut Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>

    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- swiper js -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- alertifyjs js -->
    
    <!-- notification init -->
    <script src="{{ asset('assets/js/pages/notification.init.js') }}"></script>
    <script src="{{ asset('assets/js/lang.js') }}"></script>

    
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet Alerts init js-->
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

</body>

</html>
