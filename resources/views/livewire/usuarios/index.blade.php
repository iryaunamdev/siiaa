@extends('base')

@section('content')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl text-slate-700">
        Usuarios y permisos
    </div>

    <div class="mt-6 text-gray-500">

    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-span-2">
        <div class="flex items-center">

        </div>

        <div class="ml-6 mr-6">
            <table class="min-w-full text-sm">
                <thead class="border-b">
                    <tr>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left"></th>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Correo electrónico</th>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Nombre</th>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Roles</th>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Activo</th>
                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Último acceso</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($usuarios as $usuario )
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $usuario->profile_photo_url }}" alt="{{ $usuario->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ $usuario->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->email}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->name}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->getRoleNames()}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->active}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

