<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 sm:hidden md:block md:w-4/12 lg:ml-0 lg:w-[30%] xl:w-[25%] 2xl:w-[20%] text-sm">
    <div>
        <div class="-mx-6 px-6 py-4">
            {{--
            <a href="{{ route('dashboard') }}">
                <x-jet-application-mark class="block h-9 w-auto" />
            </a>
            --}}
        </div>

        <ul class="relative space-y-2 border-t tracking-wide mt-8 pt-8">
            <li>
                <a href="{{route('dashboard')}}" aria-label="dashboard" class="side-link-1 {{ (request()->is('dashboard')) ? 'side-link-1-active' : 'side-link-1-off' }}">
                    <i class="fa-duotone fa-grid-2 fa-lg"></i>
                    <span class="-mr-1 font-medium">Dashboard</span>
                </a>
            </li>
        </ul>

        <ul class="relative space-y-2 border-t tracking-wide mt-4 pt-4">
            <li>
                <a href="{{ route('personas-list') }}" class="side-link-1 {{ (request()->is('siiaa/personal*')) ? 'side-link-1-active' : 'side-link-1-off' }}">
                    <i class="fa-duotone fa-users fa-lg"></i>
                    <span class="group-hover:text-gray-700">Personal IRyA</span>
                </a>
            </li>
            <li>
                <a href="" class="side-link-1 {{ (request()->is('personal*')) ? 'side-link-1-active' : 'side-link-1-off' }}">
                    <i class="fa-duotone fa-users fa-lg"></i>
                    <span class="group-hover:text-gray-700">Estudiantes IRyA</span>
                </a>
            </li>
        </ul>
        <ul class="relative space-y-2 border-t tracking-wide mt-4 pt-4">
            <li>
                <a
                class="side-link-1 {{ (request()->is('siiaa/configuraciones/usuarios*')) ? 'side-link-1-active' : 'side-link-1-off' }}" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse" data-bs-target="#subMenu-1" aria-expanded="true" aria-controls="subMenu-1">
                    <i class="fa-duotone fa-file-circle-check fa-lg"></i>
                    <span class="group-hover:text-gray-700">Solicitudes</span>
                </a>
                <ul class="relative accordion-collapse collapse" id="subMenu-1" aria-labelledby="subMenu-1">
                    <li class="relative">
                      <a href="{{ route('usuarios')}}" class="side-link-2 {{request()->is('siiaa/configuraciones/usuarios')? 'side-link-2-active' : 'side-link-2-off'}}" data-mdb-ripple="true" data-mdb-ripple-color="dark">Ausencias</a>
                    </li>
                    <li class="relative">
                      <a href="{{route('usuarios-permisos')}}" class="side-link-2 {{request()->is('siiaa/configuraciones/usuarios/permisos')? 'side-link-2-active' : 'side-link-2-off'}}" data-mdb-ripple="true" data-mdb-ripple-color="dark">Recursos</a>
                    </li>
                    <li class="relative">
                        <a href="{{route('usuarios-permisos')}}" class="side-link-2 {{request()->is('siiaa/configuraciones/usuarios/permisos')? 'side-link-2-active' : 'side-link-2-off'}}" data-mdb-ripple="true" data-mdb-ripple-color="dark">Visitantes</a>
                      </li>
                </ul>
            </li>
            <li>
                <a href="{{route('comisiones')}}" class="side-link-1 {{ (request()->is('comisiones*')) ? 'side-link-1-active' : 'side-link-1-off' }}">
                    <i class="fa-duotone fa-arrows-down-to-people fa-lg"></i>
                    <span class="group-hover:text-gray-700">comisiones</span>
                </a>
            </li>
        </ul>

        @hasanyrole('Superadmin|Administrador')
        <ul class="space-y-2 tracking-wider mt-4 pt-4 border-t">
            <li>
                <a
                class="side-link-1 {{ (request()->is('siiaa/configuraciones/usuarios*')) ? 'side-link-1-active' : 'side-link-1-off' }}" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse" data-bs-target="#subMenu-1" aria-expanded="true" aria-controls="subMenu-1">
                    <i class="fa-duotone fa-user-gear fa-lg"></i>
                    <span class="group-hover:text-gray-700">Usuarios y permisos</span>
                </a>
                <ul class="relative accordion-collapse collapse" id="subMenu-1" aria-labelledby="subMenu-1">
                    <li class="relative">
                      <a href="{{ route('usuarios')}}" class="side-link-2 {{request()->is('siiaa/configuraciones/usuarios')? 'side-link-2-active' : 'side-link-2-off'}}" data-mdb-ripple="true" data-mdb-ripple-color="dark">Usuarios</a>
                    </li>
                    <li class="relative">
                      <a href="{{route('usuarios-permisos')}}" class="side-link-2 {{request()->is('siiaa/configuraciones/usuarios/permisos')? 'side-link-2-active' : 'side-link-2-off'}}" data-mdb-ripple="true" data-mdb-ripple-color="dark">Roles y permisos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('configuraciones')}}" class="side-link-1 {{ (request()->is('siiaa/configuraciones')) ? 'side-link-1-active' : 'side-link-1-off' }}">
                    <i class="fa-duotone fa-gear fa-lg"></i>
                    <span class="group-hover:text-gray-700">Configuraciones</span>
                </a>
            </li>
        </ul>
        @endhasanyrole
    </div>
</aside>
