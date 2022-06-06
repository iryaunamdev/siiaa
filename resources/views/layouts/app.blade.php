<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIIAA') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/custom.js') }}" defer></script>
    </head>
    <body class="h-screen overflow-auto">
        <header class="sticky top-0 z-50">
            <div class="w-full">
                @livewire('navigation-menu')
            </div>
        </header>


        <div class=" flex items-left justify-left bg-slate-100">
            @include('side-menu')

            <div class="ml-auto mb-6 sm:w-full lg:w-[70%] xl:w-[75%] 2xl:w-[80%]">
                <livewire:toasts />

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

                @stack('modals')

                <footer class="text-xs text-center text-gray-400 py-4 px-8">
                    Sistema Integral de Información Académica y Administrativa v2.0.0<br>
                    Instituto de Radioastronomía y Astrofísica | UNAM Campus Morelia
                </footer>
            </div>
        </div>
        {{-- <x-jet-banner /> --}}
        @livewireScripts
    </body>
</html>
