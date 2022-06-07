<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\ComisionIntegrante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Integrantes extends Component
{
    use WireToast;
    protected $listeners = ['editarIntegrante'];

    protected $rules = [
        'nombre'=>'required',
        'comision_id'=>'required',
    ];

    public $nombre, $puesto, $integrante_id;
    public $comision_id;
    public $integrantes, $integranteToDelete;

    public $editMode = 0;

    public $deleteMode = false;

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

            if($this->integrante_id){
                $this->emit('upIntegrante');
                toast()->success('Integrante actualizado.')->push();

            }else{
                toast()->success('Integrante agregado.')->push();
                $this->emit('svIntegrante');
            }

            $this->resetInputFields();
            $this->editMode = false;


        }else{
            return abort(403, 'Usuario no autorizado.');
        }

    }

    public function ConfirmingDeletion(ComisionIntegrante $integrante)
    {
        $this->deleteMode =  true;
        $this->integranteToDelete = $integrante;
    }

    public function delete()
    {
        if(Auth::user()->hasanyrole($this->autorizedRoles))
        {
            $this->integranteToDelete->delete();
            $this->deleteMode =  false;
            toast()->success('El integrante ha sido eliminado.')->push();
        }else{
            return abort(403, 'Usuario no autorizado.');
        }
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->puesto = '';
        $this->integrante_id = '';
    }

    public function editarIntegrante($IntegranteID)
    {
        if($IntegranteID){
            $integrante = ComisionIntegrante::findOrFail($IntegranteID);
            $this->nombre = $integrante->nombre;
            $this->puesto = $integrante->puesto;
            $this->integrante_id = $integrante->id;
        }

        $this->editMode = true;
    }
}
