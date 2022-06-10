<div>
    <h5 class="text-lg text-sky-900 border-b mt-8 mb- title-5">Integrantes</h5>
    @if ($editMode)
        <!-- Modal window -->
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form class="p-6">
                        <div class="grid grid-cols-1 gap-3">
                            <div class="form-floating">
                                <input type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('nombre') border-red-600 @enderror"
                                    id="floatingInput1" placeholder="Nombre del integrante" wire:model="nombre">
                                <label for="floatingInput1" class="text-gray-700">Nombre del integrante</label>
                                @error('nombre') <p class="text-xs italic text-red-600">Nombre del integrante requerido</p> @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                                    id="floatingInput2" placeholder="(Puesto/Adscripcion)" wire:model="puesto">
                                <label for="floatingInput2" class="text-gray-700">(Puesto/Adscripcion)</label>
                            </div>

                            <div class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse">
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click.prevent="$set('editMode', false)" type="button"
                                    class=" rounded-r inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase hover:bg-slate-700 focus:bg-slate-700 focus:outline-none focus:ring-0 active:bg-slate-800 transition duration-150 ease-in-out">Cerrar</button>
                                </span>
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button"
                                    class="rounded-l inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endif

<x-jet-action-message class="mt-2 text-cyan-600 italic" on="upIntegrante">
    Registro actualizado.
</x-jet-action-message>

<x-jet-action-message class="mt-2 text-cyan-600 italic" on="svIntegrante">
    Registro creado.
</x-jet-action-message>

<table class="table-fixed w-full">
    <tbody>
        @foreach ($integrantes as $index => $integrante)
            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-sky-100">
                <td class="px-6 py-4 whitespace-nowrap text-gray-900 text-light w-6">{{ $index + 1 }}</td>                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                    <button wire:click.prevent="$emit('editarIntegrante', {{ $integrante->id }})">
                        <p class="font-bold">{{ $integrante->nombre }}</p>
                        <p class="font-light">{{ $integrante->puesto }}</p>
                    </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-900 w-20 text-center">
                    @hasanyrole('Superadmin|Administrador')
                    <button type="button" wire:click.prevent="ConfirmingDeletion({{ $integrante }})"><i class="fa-duotone fa-circle-trash fa-lg text-red-600 hover:text-red-800"></i></button>
                    @endhasanyrole
                </td>
        @endforeach
    </tbody>
</table>



<!-- Delete Confirmation Modal -->
<x-jet-confirmation-modal wire:model="deleteMode">
    <x-slot name="title">
        Elimiminar Integrante
    </x-slot>

    <x-slot name="content">
        Se eliminará permanentemente el registro.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('deleteMode')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
</div>
