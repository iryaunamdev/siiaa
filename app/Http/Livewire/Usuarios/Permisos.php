<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Permisos extends Component
{
    public function render()
    {
        $this->roles = Role::all();
        $this->users = User::all();
        return view('livewire.usuarios.permisos');
    }
}
