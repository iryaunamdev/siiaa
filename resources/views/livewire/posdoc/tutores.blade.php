<div class="px-6">
    @if($editMode)
    <h3 class="font-bold text-lg border-b mt-2 text-slate-500">Tutor(es)</h3>
    <form>
        <div class="grid grid-cols-2 gap-2 mt-2">
            <div class="form-floating">
                <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none"
                    placeholder="Tutor IRyA" wire:model="tutor_id">
                <label class="text-gray-700">Tutor IRyA</label>
            </div>
            <div class="flex items-end">
                <button wire:click.prevent="" type="button"
                class="rounded-l rounded-r inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
            </div>
        </div>
    </form>
    @endif
</div>
