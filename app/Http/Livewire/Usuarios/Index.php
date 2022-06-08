<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $usuarios;

    public function render()
    {
        $this->usuarios = User::all();
        return view('livewire.usuarios.index');
    }
}
