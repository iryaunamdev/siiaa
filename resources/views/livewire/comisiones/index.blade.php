@extends('base')

@section('content')
<div class="py-8 px-6 sm:py-6 sm:py-4 transition ease-in-out">
    <div class="p-6 bg-white">
        <div class="mt-4 mb-2 text-xl text-sky-900 page-title">
            Comisiones locales
        </div>
        <div class="flex justify-end toolbar border border-gray-100 border-dotted">
            <div>

                <a href="{{route('comisiones-editar')}}" class=" inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out rounded-r rounded-l"><i
                    class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Comisión</a>

                {{--
                <button type="button" wire:click.prevent="edit()"
                class=" inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out rounded-r rounded-l"><i
                    class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Comisión</button>
                --}}
            </div>
        </div>

        <div class="mt-6 text-gray-900 text-sm">
            <table class="table-fixed w-full">
                <thead class="border-b bg-gray-50">
                    <tr class="bg-gray-300">
                        <th scope="col" class="text-sm font-medium text-gray-900 px-4 py-4 w-4">No.</th>
                        <th scope="col" class="text-sm text-left font-medium text-gray-900 px-4 py-4">Nombre de la Comisión</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-4 py-4"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($comisiones as $comision )
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900">{{ $comision->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                            <a href="{{route('comisiones-editar', $comision->id)}}">{{$comision->titulo}}</a></td>
                            {{--
                            <button wire:click.prevent="edit({{$comision->id}})">{{ $comision->titulo }}</button>
                            --}}

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900"">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
