<div>
    <h5 class="text-lg text-sky-900 border-b mb-8 title-5">Documentos</h5>
    @if($this->editMode)
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
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 form-group col-span-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Titulo
                            </label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="titulo">
                            @error('titulo')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Fecha
                            </label>
                            <input type="date"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="fecha">
                        </div>
                        <div class="mb-4 form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Tipo de documento
                            </label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="tipo_id">
                        </div>
                        <div class="mb-4 form-group col-span-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Documento
                            </label>
                            <input type="file"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="file">
                        </div>
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

                </form>
            </div>
        </div>
    </div>
    @endif

    @if(count($documentos))
    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Titulo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento )
            <tr>
                <td>{{$documento->fecha->format('d/m/Y')}}</td>
                <td><a href="{{Storage::url('comisiones/'.$documento->filename)}}">{{$documento->titulo}}</a></td>
                <td>{{$documento->tipo_id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <p class="text-xs text-gray-400 italic">{{ count($documentos)}} documentos encontrados.</p>
</div>
