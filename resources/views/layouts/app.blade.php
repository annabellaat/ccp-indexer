<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Digital Archives') }}</title>
        <link rel="icon" href="{{ url('img/favicon.png') }}">


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
            <div class="">
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </div>
            @include('layouts.footer')
        </div>
        @stack('scripts')
        @livewireScripts
    </body>
</html>
