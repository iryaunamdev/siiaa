<div>
    <div class="hidden bg-indigo-600 bg-sky-600 bg-cyan-600 bg-blue-600"></div>
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
                        <div class="form-floating col-span-2">
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('titulo') border-red-600 @enderror"
                                id="floatingInput1" placeholder="Título del documento" wire:model="titulo">
                            <label for="floatingInput1" class="text-gray-700">Título del documento</label>
                            @error('titulo') <p class="text-xs italic text-red-600">Título del documento requerido</p> @enderror
                        </div>

                        <div class="form-floating">
                            <input type="date" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('titulo') border-red-600 @enderror"
                                id="floatingInput2" placeholder="Fecha" wire:model="fecha">
                            <label for="floatingInput2" class="text-gray-700">Fecha</label>
                            @error('fecha') <p class="text-xs italic text-red-600">Fecha del documento requerida</p> @enderror
                        </div>

                        <div class="mb-4 form-group">
                                <select class="form-select block w-full px-3 py-3.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('tipo_id') border-red-600 @enderror"
                                 placeholder="tipo_id" wire:model="tipo_id" aria-label="Tipo de documentos">
                                    <option selected>Tipo de documento</option>
                                    @foreach ($tipo_docs as $tipo )
                                        <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_id') <p class="text-xs italic text-red-600">Tipo de documento requerido</p> @enderror
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
        <thead class="border-b bg-white text-left">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2 w-1/6">Fecha</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2 w-3/6">Documento</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2 w-1/6">Tipo Doc.</th>
                <th class="w-1/12"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento )
            <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">{{$documento->fecha->format('d/m/Y')}}</td>
                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{Storage::url('comisiones/'.$documento->filename)}}">{{$documento->titulo}}</a></td>
                <td class="text-xs text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold {{ $badge_colors[$documento->tipo_id] }} text-white rounded-full">{{$tipo_docs[$documento->tipo_id]->name}}</span>

                </td>
                <td class="px-6 py-2 whitespace-nowrap">
                    <button><i class="fa-duotone fa-circle-trash fa-lg text-red-600 hover:text-red-800"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <p class="text-xs text-gray-400 italic">{{ count($documentos)}} documentos encontrados.</p>
</div>
