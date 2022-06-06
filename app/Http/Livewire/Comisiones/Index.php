<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\Comision;
use Livewire\Component;

class Index extends Component
{
    public $comisiones;
    public $editMode=0;


    public function render()
    {
        $this->comisiones = Comision::all();
        return view('livewire.comisiones.index');
    }

    public function edit($id = null)
    {
        $this->editMode = true;
        if($id)
        {
            $this->emit('comisionEdit', $id);
        }
    }
}
