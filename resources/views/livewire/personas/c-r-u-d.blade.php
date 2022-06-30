@extends('base')

@section('content')
<div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 justify-between">
    <div class="ml-8 mt-8 text-2xl text-slate-700">
        Registro de personal IRyA
    </div>

    <div class="mt-8 mr-6 flex justify-end">
        <div class="flex w-full rounded-md shadow-sm sm:w-auto">
            <button wire:click.prevent="storePersona()" type="button"
        class="rounded-l inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
        </div>
        @if($tipo_clave=='POS' and $personal_id)
        <div class="flex w-full rounded-md shadow-sm sm:w-auto">
            <button wire:click.prevent="$emitTo('posdoc.becas', 'addBeca')" type="button"
            class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1"><i
            class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Beca</button>
        </div>

        <div class="flex w-full rounded-md shadow-sm sm:w-auto">
            <button wire:click.prevent="$emitTo('posdoc.tutores', 'addTutor')" type="button"
            class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1"><i
            class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Tutor</button>
        </div>
        @endif

        @if($personal_id)
        <div class="flex w-full rounded-md shadow-sm sm:w-auto">
            <button wire:click.prevent="deletePersona()" type="button"
            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-0 active:bg-red-800 transition duration-150 ease-in-out mr-1">Eliminar</button>
        </div>
        @endif

        <div class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <a href="{{ route('personas-list') }}"
            class=" rounded-r inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase hover:bg-slate-700 focus:bg-slate-700 focus:outline-none focus:ring-0 active:bg-slate-800 transition duration-150 ease-in-out">Cerrar</a>
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-span-2">
        <form class="p-6">
            <div class="grid grid-cols-4 gap-2 justify-items-stretch">
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('apellidop') border-red-600 @enderror"
                        placeholder="Apellido paterno" wire:model="apellidop">
                    <label class="text-gray-700">Apellido paterno</label>
                    @error('apellidop') <p class="text-xs italic text-red-600">Apellido paterno</p> @enderror
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Apellido materno" wire:model="apellidom">
                    <label class="text-gray-700">Apellido materno</label>
                </div>
                <div class="form-floating col-span-2">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('nombre') border-red-600 @enderror"
                        placeholder="Nombre(s)" wire:model="nombre">
                    <label class="text-gray-700">Nombre(s)</label>
                    @error('apellidop') <p class="text-xs italic text-red-600">Nombre(s)</p> @enderror
                </div>

                <div class="form-floating col-span-2">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="CURP" wire:model="curp">
                    <label class="text-gray-700">CURP</label>
                </div>
                <div class="form-floating col-span-2">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="RFC" wire:model="rfc">
                    <label class="text-gray-700">RFC</label>
                </div>

                <div class="form-floating">
                    <input type="date"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Fecha de nacimiento" wire:model="fecha_nacimiento">
                    <label class="text-gray-700">Fecha de nacimiento</label>
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Nacionalidad" wire:model="nacionalidad_id">
                    <label class="text-gray-700">Nacionalidad</label>
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Escolaridad" wire:model="escolaridad_id">
                    <label class="text-gray-700">Escolaridad</label>
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Sexo" wire:model="sexo_id">
                    <label class="text-gray-700">Sexo</label>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2 mt-6">
                <div class="form-floating">
                    <select class="form-select block w-full px-3 py-2 pt-6 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('tipo_id') border-red-600 @enderror"
                    placeholder="Tipo de personal" wire:click="tipoPersonalEvent($event.target.value)" aria-label="Tipo de personal">
                        <option {{ $tipo_id ? '' : 'selected'}}></option>
                        @foreach ($tipos_personal as $item )
                        <option value="{{ $item->id }}" {{ $tipo_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="text-gray-700 mb-2">Tipo de personal</label>
                </div>

                @if($tipo_clave == 'POS' OR $tipo_clave == 'SSO')
                <div class="form-floating">
                    <input type="date"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Fecha de ingreso" wire:model="fecha_alta">
                    <label class="text-gray-700">Fecha de ingreso</label>
                </div>
                <div class="form-floating">
                    <input type="date"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Fecha de baja" wire:model="fecha_baja">
                    <label class="text-gray-700">Fecha de baja</label>
                </div>
                @endif

                @if($persona_id)
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Cuenta de usuario SIIAA" wire:model="user_id">
                    <label class="text-gray-700">Cuenta de usuario SIIAA</label>
                </div>
                @endif
            </div>

        @if($tipo_id)
            @if($tipo_clave != 'POS' AND $tipo_clave !== 'SSO')
            <div class="grid grid-cols-4 gap-2 mt-6">
                @if($tipo_clave == 'INV' OR $tipo_clave =='TAC')
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Nombramiento" wire:model="nombramiento_id">
                    <label class="text-gray-700">Nombramiento</label>
                </div>
                @endif
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Tipo de contrato" wire:model="contrato_id">
                    <label class="text-gray-700">Tipo de contrato</label>
                </div>
                <div class="form-floating">
                    <input type="date"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Fecha de ingreso" wire:model="fecha_alta">
                    <label class="text-gray-700">Fecha de ingreso</label>
                </div>
                <div class="form-floating">
                    <input type="date"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Fecha de baja" wire:model="fecha_baja">
                    <label class="text-gray-700">Fecha de baja</label>
                </div>
            </div>
            @endif

            @if($tipo_clave == 'INV' OR $tipo_clave == 'TAC' OR $tipo_clave == 'POS')
            <div class="grid grid-cols-5 gap-2 mt-2">
                <div class="form-floating col-span-2">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="ORCID" wire:model="orcid">
                    <label class="text-gray-700">ORCID</label>
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Nivel SNI" wire:model="sni_id">
                    <label class="text-gray-700">Nivel SNI</label>
                </div>

                @if($tipo_clave == 'INV' OR $tipo_clave == 'TAC')
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Nivel PRIDE" wire:model="pride_id">
                    <label class="text-gray-700">Nivel PRIDE</label>
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                        placeholder="Año PRIDE" wire:model="pride_y">
                    <label class="text-gray-700">Año PRIDE</label>
                </div>
                @endif
            </div>
            @endif
        @endif {{-- For TIPO selected --}}
        </form>
        @if($tipo_clave == 'POS')
        <div class="px-6 grid grid-cols-2 gap-4">
            <div>
                <table class="w-full ">
                    <thead>
                        <tr class="border-b">
                            <th class="px-6 py-4 text-left" colspan=3>Beca(s)</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div>
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-6 py-4 text-left" colspan="3">Tutor(es)</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
