<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 sm:hidden md:block md:w-4/12 lg:ml-0 lg:w-[30%] xl:w-[25%] 2xl:w-[20%] text-sm">
    <div>
        <div class="-mx-6 px-6 py-4">
            {{--
            <a href="{{ route('dashboard') }}">
                <x-jet-application-mark class="block h-9 w-auto" />
            </a>
            --}}
        </div>

        <ul class="space-y-2 tracking-wide mt-8 pt-8">
            <li>
                <a href="#" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                    <i class="fa-duotone fa-grid-2 fa-lg"></i>
                    <span class="-mr-1 font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('comisiones')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gradient-to-r from-white to-slate-200">
                    <i class="fa-duotone fa-arrows-down-to-people fa-lg text-gray-600 hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">comisiones</span>
                </a>
            </li>
        </ul>

        @hasanyrole('Superadmin|Administrador')
        <ul class="space-y-2 tracking-wider mt-8 pt-4 border-t">
            <li>
                <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gradient-to-r from-white to-slate-200">
                    <i class="fa-duotone fa-user-gear fa-lg text-gray-600 hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">Usuarios y permisos</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gradient-to-r from-white to-slate-200">
                    <i class="fa-duotone fa-gear fa-lg text-gray-600 hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">Configuraciones</span>
                </a>
            </li>
        </ul>
        @endhasanyrole
    </div>
</aside>
