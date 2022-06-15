<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IRyA | SIIAA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontpage.css')}}">

        <script src="{{ mix('js/custom.js')}}"></script>

    </head>
    <body class="antialiased bg">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-stretch sm:pt-0">
                    <img src="{{asset('img/logoIRyABlanco.png')}}" alt="" class="w-24 mr-4">
                    <div class="self-end">
                        <h1 class="text-3xl text-white font-bold text-shadow">Instituto de Radioastronomía y Astrofísica</h1>
                        <h2 class="text-2xl text-sky-100">Asuntos Internos</h2>
                    </div>
                </div>

                <div class="mt-8 bg-blue-900 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        <div class="p-6 border-r">
                            <div class="justify-items-center text-lg leading-7 font-semibold">
                                <i class="fa-light fa-screen-users fa-2xl text-slate-400 mr-4"></i>
                                <a href="https://laravel.com/docs" class="text-slate-100 font-bold dark:text-white">Secretaría Académica</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-r border-stale-400 dark:border-gray-700 md:border-t-0">
                            <div class="justify-items-center text-lg leading-7 font-semibold text-center">
                                <i class="fa-light fa-books fa-2xl text-slate-400 mr-4"></i>
                                <a href="https://laracasts.com" class="text-slate-100 font-bold dark:text-white">Acervo</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                </div>
                            </div>
                        </div>

                        <div class="p-6 dark:border-gray-700">
                            <div class="justify-items-center text-lg leading-7 font-semibol text-center">
                                <i class="fa-light fa-database fa-2xl text-slate-400 mr-4"></i>
                                <a href="@if (Route::has('login')) {{route('login')}} @else {{reoute('dashboard')}} @endif" class="text-slate-100 dark:text-white font-bold">SIIAA</a>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center">
                    <div class="ml-4 text-center text-sm text-white sm:text-right sm:ml-0">
                        Instituto de Radioastronomía y Astrofísica<br>
                        Universidad Nacional Autónoma de México
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
