<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Digital Archive') }}</title>
        <link rel="icon" href="{{ url('img/favicon.png') }}">
        <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-RXMY2KXSHN"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-RXMY2KXSHN');
        </script>
        
        <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
        <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon" type="image/png">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        
        <link href="{{mix('css/app.css')}}" rel="stylesheet">
        
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('argon') }}/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.2.0" rel="stylesheet">
        {{-- <link href="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('argon') }}/vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet"> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/> -->







        <!-- Fonts -->
        <style>
            /* @font-face {
                font-family: kagitingan;
                src: url({{url('fonts/kagitingan.otf')}});
            }
            .font-kagitingan {
                font-family: kagitingan;
            } */
            @font-face {
                font-family: misgott;
                src: url({{url('fonts/mission-gothic/MissionGothicThin.otf')}});
            }
            @font-face {
                font-family: misgotr;
                src: url({{url('fonts/mission-gothic/MissionGothicRegular.otf')}});
            }
            @font-face {
                font-family: misgotb;
                src: url({{url('fonts/mission-gothic/MissionGothicBold.otf')}});
            }
            @font-face {
                font-family: misgotbl;
                src: url({{url('fonts/mission-gothic/MissionGothicBlack.otf')}});
            }
            .font-mgt {
                font-family: misgott; 
            }
            .font-mg {
                font-family: misgotr; 
            }
            .font-mgb {
                font-family: misgotb; 
            }
            .font-mgbl {
                font-family: misgotbl; 
            }
            html {
                scroll-padding-top: 4rem;
            }
            @font-face {
                font-family: Inter;
                src: url({{url('fonts/Inter/static/Inter-Regular.ttf')}});
            }
            @font-face {
                font-family: Inter-bold;
                src: url({{url('fonts/Inter/static/Inter-Bold.ttf')}});
            }
            @font-face {
                font-family: Inter-black;
                src: url({{url('fonts/Inter/static/Inter-Black.ttf')}});
            }
            @font-face {
                font-family: Inter-light;
                src: url({{url('fonts/Inter/static/Inter-Light.ttf')}});
            }
            .font-inter {
                font-family: Inter;
            }
            .font-interbold {
                font-family: Inter-bold;
            }
            .font-interblack {
                font-family: Inter-black;
            }
            .font-interlight {
                font-family: Inter-light;
            }
        </style>

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-inter">
        <div class="bg-gray-100 d-flex flex-grow-1 flex-column">
            @include('layouts.navigation')
            @yield('content')
            @include('layouts.footer')
        </div>
        @stack('scripts')
        @livewireScripts
    </body>
</html>
