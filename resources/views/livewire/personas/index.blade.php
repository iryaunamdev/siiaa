@extends('base')

@section('content')
<div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 justify-between">
    <div class="ml-8 mt-8 text-2xl text-slate-700">
        Personal IRyA
    </div>

    <div class="mt-8 mr-6 text-right">
        <a href="{{ route('personas-crud') }}" class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out rounded-r rounded-l"><i class="fa-duotone fa-circle-plus fa-lg"></i> Ingreso</a>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-span-2">
        <div class="ml-6 mr-6">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b text-sm text-gray-900">
                        <th class="px-6 py-4 text-left w-1/12">No.</th>
                        <th class="px-6 py-4 text-left">Nombre</th>
                        <th class="px-6 py-4 text-left w-2/12">T. Contrato</th>
                        <th class="px-6 py-4 text-left w-1/12">Activo</th>
                        <th class="px-6 py-4 text-left w-2/12"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                @foreach ($personas as $persona )
                    <tr class="border-b ext-sm text-gray-900 font-light">
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('personas-crud', $persona->id) }}">
                            {{ $persona->apellidop }} {{ $persona->apellidom??'' }} {{ $persona->nombre  }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
