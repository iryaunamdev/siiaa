<?php

namespace App\Http\Livewire\Configuraciones;

use App\Models\ConfiguracionCatalogo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Catalogos extends Component
{
    public $verifiedRoles = [
        'Superadmin',
        'Administrador',
    ];
    public $catalogos;


    public function render()
    {
        if(Auth::user()->hasanyroles($verifiedRoles)){
            $this->catalogos = ConfiguracionCatalogo::all();
            return view('livewire.configuraciones.catalogos');
        }else{
            return abort('403', 'Usuario no autorizado');
        }

    }
}
