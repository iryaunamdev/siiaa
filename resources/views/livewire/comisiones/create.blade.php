@extends('base')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-3 justify-between">
        <div class="ml-8 mt-8 text-2xl text-slate-700">
            {{ $titulo }}
        </div>

        <div class="mt-8 mr-6 text-right col-span-2">
            <button wire:click.prevent="store()" type="button"
                class="rounded-l inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
            @if ($comision_id)
                <button type="button" wire:click.prevent="$emit('editarIntegrante', null)"
                    class=" inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1"><i
                        class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Integrantes</button>

                <button type="button" wire:click.prevent="$emit('editarDocumento', null)"
                    class=" inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1"><i
                        class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Documentos</button>
            @endif

            <a href="{{ route('comisiones') }}"
                class=" rounded-r inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase hover:bg-slate-700 focus:bg-slate-700 focus:outline-none focus:ring-0 active:bg-slate-800 transition duration-150 ease-in-out">Cerrar</a>
        </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-2 md:grid-cols-2">
        <div class="p-9 border-t border-gray-200 md:border-t-0 md:border-l">
            <div class="p-6 bg-white ease-out duration-400">
                <h5 class="text-lg text-sky-900 border-b mb-8 title-5">Datos Generales</h5>
                {{ $comision }}
                <form>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('titulo') border-red-600 @enderror"
                                    id="floatingInput1" placeholder="Nombre de la comisi??n" wire:model="titulo">
                                <label for="floatingInput1" class="text-gray-900">Nombre de la comisi??n</label>
                                @error('titulo')
                                    <p class="text-xs italic text-red-600">Nombre de la comisi??n requerido</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                                    id="floatingInput2" placeholder="Contacto" wire:model="contacto">
                                <label for="floatingInput2" class="text-gray-700">Contacto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                                    id="floatingInput3" placeholder="URL local" wire:model="url_local">
                                <label for="floatingInput3" class="text-gray-700">URL local</label>
                            </div>
                            <textarea
                                class="   form-control   block   w-full   px-3   py-1.5   text-base   font-normal   text-gray-700   bg-white bg-clip-padding   border border-solid border-gray-300   rounded   transition   ease-in-out   m-0   focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                                rows="3" placeholder="Breve de las funciones de la Comisi??n" wire:model="descripcion">
                            </textarea>

                        </div>
                    </div>
                    <x-jet-action-message class="mt-2 text-cyan-600 italic" on="updated">
                        Registro actualizado.
                    </x-jet-action-message>
                    <x-jet-action-message class="mt-2 text-cyan-600 italic" on="saved">
                        Registro creado.
                    </x-jet-action-message>
                </form>
                @if ($comision_id)
                    @livewire('comisiones.integrantes', ['comision_id' => $comision_id])
                @endif
            </div>
        </div>
        <div class="p-9 border-t border-gray-200 md:border-t-0 md:border-l">
            <div class="p-6 bg-white ease-out duration-400">
                @if ($comision_id)
                    @livewire('comisiones.documentos', ['comision_id' => $comision_id])
                @endif
            </div>
        </div>
    </div>
@endsection
