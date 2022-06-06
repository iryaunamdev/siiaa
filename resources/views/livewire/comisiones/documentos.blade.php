<div>
    <h5 class="text-lg text-sky-900 border-b mb-8 title-5">Documentos</h5>
    @if($editMode)
    <form>
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

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mb-4">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="store()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                    Guardar

                </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click.prevent="$set('editMode', false)" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                    Cerrar

                </button>
            </span>
        </div>

    </form>
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
