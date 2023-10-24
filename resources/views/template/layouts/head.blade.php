<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Gestor de incidencias Hidrobolivar</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{--
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/Quicksand_400,500,600,700.css') }}">
    <link href="{{asset('template/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />

    {{-- para el sweetalert --}}
    <link href="{{asset('template/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('template/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{asset('template/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />


    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    @livewireStyles
    {{-- @livewireScripts --}}

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('styles')

    @yield('scripts_defer')

    <style>
        body {
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/template/assets/img/50677.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.2;
            /* Ajusta el valor de la opacidad según se necesites */
        }

        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 184px) !important;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
