<div class="py-8 px-6 sm:py-6 sm:py-4 transition ease-in-out">
    <div class="p-6 bg-white">
        <div class="mt-4 mb-2 text-xl text-sky-900 page-title">
            Configración del sistema
        </div>

        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-menu"
            role="tablist">
            <li class="nav-item flex-auto text-center" role="presentation">
                <a href="#tabs-1"
                    class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                    id="tabs-link-1" data-bs-toggle="pill" data-bs-target="#tabs-1" role="tab" aria-controls="tabs-1"
                    aria-selected="true">Catálogos</a>
            </li>
        </ul>

        <div class="tab-content" id="tabs-tabContentFill">
            <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="tabs-link-1">
                @livewire('configuraciones.catalogos')
            </div>
        </div>
    </div>
</div>
