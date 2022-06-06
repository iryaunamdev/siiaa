<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\ComisionIntegrante;
use Livewire\Component;

class Integrantes extends Component
{
    protected $listeners = ['editarIntegrante'];

    protected $rules = [
        'nombre'=>'required',
        'comision_id'=>'required',
    ];

    public $nombre, $puesto, $integrante_id;
    public $comision_id;
    public $integrantes;

    public $editMode = 0;



    public function render()
    {
        if($this->comision_id)
        {
            $this->integrantes = ComisionIntegrante::where('comision_id', $this->comision_id)->get();
        }
        return view('livewire.comisiones.integrantes');
    }

    public function store()
    {
        $this->validate();

        $integrante = ComisionIntegrante::updateOrCreate(['id'=>$this->integrante_id],[
            'nombre'=>$this->nombre,
            'puesto'=>$this->puesto,
            'comision_id'=>$this->comision_id,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('integrateAdded');
        $this->editMode = false;
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->puesto = '';
        $this->integrante_id = '';
    }

    public function editarIntegrante($IntegranteID)
    {
        $this->editMode = true;
    }
}
