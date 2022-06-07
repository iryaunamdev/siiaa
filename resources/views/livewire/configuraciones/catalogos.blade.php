<div>
    <div class="flex justify-end toolbar border border-gray-100 border-dotted">
        <div>
            <button type="button" class=" inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out rounded-r rounded-l" wire:click.prevent="$set('editMode',true )"><i class="fa-duotone fa-circle-plus fa-lg pr-2"></i> Catálogo</button>
        </div>
    </div>
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
                    <div class="grid grid-cols-2 gap-3">
                        <div class="form-floating col-span-2">
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('name') border-red-600 @enderror"
                                id="floatingInput1" placeholder="Nombre del catálogo" wire:model="name">
                            <label for="floatingInput1" class="text-gray-700">Nombre del catálogo</label>
                            @error('name')
                            <p class="text-xs italic text-red-600">Nombre del catálogo requerido</p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('clave') border-red-600 @enderror"
                                id="floatingInput2" placeholder="Clave del catálogo" wire:model="clave">
                            <label for="floatingInput2" class="text-gray-700">Clave (max. 8 carácteres)</label>
                            @error('clave')
                            <p class="text-xs italic text-red-600">Clave del catálogo requerida</p>
                            @enderror
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
    @endif
    <div class="grid grid-cols-3 gap-4">
        @foreach ($catalogos as $catalogo )
        <div class="flex justify-left">
            <div class="block rounded-lg shadow-lg bg-white max-w-sm">
                <div class="py-3 px-6 border-b border-gray-300">
                    <div class="flex justify-end">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button"
                            class="inline-block leading-tight" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar catálogo"><i class="fa-duotone fa-pen-to-square fa-lg text-sky-700 hover:text-cyan-400 focus:text-sky-700 focus:outline-none focus:ring-0 active:text-cyan-400 transition duration-150 ease-in-out"></i></button>
                        </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="addItem({{$catalogo->id}})" type="button"
                            class="inline-block leading-tight" data-bs-toggle="tooltip" data-bs-placement="top" title="Agragar elemento a catálogo"><i class="fa-duotone fa-square-plus fa-lg text-sky-700 hover:text-cyan-400 focus:text-sky-700 focus:outline-none focus:ring-0 active:text-cyan-400 transition duration-150 ease-in-out"></i></button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button"
                            class="inline-block leading-tight" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar catálogo"><i class="fa-duotone fa-circle-minus fa-lg text-red-600 hover:text-red-700 focus:text-red-700 focus:outline-none focus:ring-0 active:text-red-700 transition duration-150 ease-in-out"></i></button>
                        </span>
                    </div>
                    <h5 class="text-sky-900 text-lg font-medium">{{ $catalogo->name }}<br><span class="text-xs text-light">{{ $catalogo->clave }}</span></h5>
                </div>
                <div class="max-h-30 overflow-y-auto">
                  <table class="w-full">
                        <tbody>
                        @foreach ($catalogo->items as $item )
                            <tr>
                                <td class="px-6 py-2 text-medium"><span class="text-light text-xs">[{{ $item->clave }}]</span> {{ $item->name }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                  </table>
                </div>
                <div class="py-3 px-6 border-t border-gray-300 text-gray-600 text-xs italic text-right">
                    {{ $catalogo->items ? count($catalogo->items) : 0 }} elementos en este catálogo.
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if ($editItem)
    <!-- Modal window FOR item -->
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
                    <div class="grid grid-cols-2 gap-3">
                        <div class="form-floating col-span-2">
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('item_name') border-red-600 @enderror"
                                id="floatingInput1" placeholder="Nombre del catálogo" wire:model="item_name">
                            <label for="floatingInput1" class="text-gray-700">Nombre para mostrar</label>
                            @error('item_name')
                            <p class="text-xs italic text-red-600">Nombre para mostrar</p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('item_clave') border-red-600 @enderror"
                                id="floatingInput2" placeholder="Clave del del elemento" wire:model="item_clave">
                            <label for="floatingInput2" class="text-gray-700">Clave (max. 8 carácteres)</label>
                            @error('item_clave')
                            <p class="text-xs italic text-red-600">Clave (max. 8 carácteres)</p>
                            @enderror
                        </div>

                        <div class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click.prevent="$set('editItem', false)" type="button"
                                    class=" rounded-r inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase hover:bg-slate-700 focus:bg-slate-700 focus:outline-none focus:ring-0 active:bg-slate-800 transition duration-150 ease-in-out">Cerrar</button>
                            </span>
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="storeItem()" type="button"
                                    class="rounded-l inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
