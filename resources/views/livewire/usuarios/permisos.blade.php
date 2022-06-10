@extends('base')

@section('content')
<div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 justify-between">
    <div class="ml-8 mt-8 text-2xl text-slate-700">
        Roles y permisos
    </div>

    <div class="mt-8 mr-6 text-right">
        <button type="button" wire:click.prevent="editarRol()" class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase hover:bg-sky-700 focus:bg-sky-700 focus:outline-none focus:ring-0 active:bg-sky-800 transition duration-150 ease-in-out rounded-r rounded-l"><i class="fa-duotone fa-circle-plus fa-lg"></i> Rol</button>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-span-2">
        <div class="ml-6 mr-6 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-4 gap-4">
            @foreach ($roles as $role)
            <div class="flex justify-left w-full">
                <div class="block rounded-lg shadow-lg bg-white max-w-sm">
                    <div class="py-3 px-6 border-b border-gray-300">
                        <div class="flex justify-between">
                            <span>
                                <button type="button" wire:click.prevent="editRole({{$role}})" class="text-sky-900 text-lg font-medium text-left">{{ $role->name }}</button>
                            </span>
                        </div>
                    </div>
                    <div class="max-h-30 overflow-y-auto">
                      <table class="w-full">
                            <tbody>
                            @php($t_users=0)
                            @foreach ($users as $user )
                                @if ($user->getRoleNames()->contains($role->name))
                                <tr>
                                    <td class="px-6 py-2 text-light">{{$user->email}}</td>
                                </tr>
                                @php($t_users++)
                                @endif
                            @endforeach
                            </tbody>
                      </table>
                    </div>
                    <div class="py-3 px-6 border-t border-gray-300 text-gray-600 text-xs italic text-right">
                        {{$t_users}} usuario(s) asignados.
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
