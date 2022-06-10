@extends('modal-base')

@section('modal-body')
    <form class="p-6">
        <div class="grid grid-cols-1 gap-3">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />


                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    Selecciona una foto de perfil
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        Eliminar foto de perfil
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
            @endif

            <div class="form-floating">
                <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('name') border-red-600 @enderror"
                    placeholder="Nombre de usuario para mostrar" wire:model="name">
                <label class="text-gray-700">Nombre de usuario para mostrar</label>
                @error('name') <p class="text-xs italic text-red-600">Nombre del usuario requerido</p> @enderror
            </div>
            <div class="form-floating">
                <input type="email"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('email') border-red-600 @enderror"
                    placeholder="Correo electrónico" wire:model="email">
                <label class="text-gray-700">Correo electrónico</label>
                @error('email') <p class="text-xs italic text-red-600">Correo electrónico obligatorio</p> @enderror
            </div>
            @if(!$user->password)
            <div class="form-floating">
                <input type="password"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-bl focus:outline-none @error('password') border-red-600 @enderror"
                    placeholder="Correo electrónico" wire:model="password">
                <label class="text-gray-700">Contraseña</label>
                @error('password') <p class="text-xs italic text-red-600">Contraseña</p> @enderror
            </div>
            @endif
        </div>
        <p class="uppercase text-sm pt-6 pb-2">Roles de usuario</p>
        <div class="grid grid-cols-3 justify-between">
            @foreach ($roles as $role )
                <div class="form-check">
                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" wire:model.defer="selectedRoles.{{$role->id}}">
                    <label class="form-check-label inline-block text-gray-800">
                    {{$role->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </form>
@endsection

@section('modal-footer')
    <!-- Action buttons -->
    <div class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <button wire:click.prevent="storeUser()" type="button"
        class="rounded-l inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out mr-1">Guardar</button>
    </div>
    @if($user_id)
    <div class="flex w-full rounded-md shadow-sm sm:w-auto">
        <button wire:click.prevent="storeUser()" type="button"
        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-0 active:bg-red-800 transition duration-150 ease-in-out mr-1">Eliminar</button>
    </div>
    @endif
    <div class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button wire:click.prevent="$set('editMode', false)" type="button"
        class=" rounded-r inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase hover:bg-slate-700 focus:bg-slate-700 focus:outline-none focus:ring-0 active:bg-slate-800 transition duration-150 ease-in-out">Cerrar</button>
    </div>
@endsection
