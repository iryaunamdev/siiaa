<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\ComisionIntegrante;
use Illuminate\Support\Facades\Auth;
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

    public $autorizedRoles = [
        'Superadmin',
        'Administrador',
    ];

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
        if(Auth::user()->hasanyrole($this->autorizedRoles))
        {
            $this->validate();

            $integrante = ComisionIntegrante::updateOrCreate(['id'=>$this->integrante_id],[
                'nombre'=>$this->nombre,
                'puesto'=>$this->puesto,
                'comision_id'=>$this->comision_id,
            ]);

            $this->resetInputFields();
            $this->editMode = false;

        }else{
            return abort(403, 'Usuario no autorizado.');
        }

    }

    public function delete($id)
    {
        if(Auth::user()->hasanyrole($this->autorizedRoles))
        {
            $integrante = ComisionIntegrante::find($id)->delete();
        }else{
            return abort(403, 'Usuario no autorizado.');
        }
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->puesto = '';
    }

    public function editarIntegrante($IntegranteID)
    {
        $this->editMode = true;
    }
}
