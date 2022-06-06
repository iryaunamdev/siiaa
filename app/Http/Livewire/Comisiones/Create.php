<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\Comision;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['comisionEdit'];
    protected $rules = [
        'titulo'=>'required',
    ];

    public $titulo, $contacto, $url_local, $descripcion;
    public $comision, $comision_id;
    public $editMode = 0;

    public function mount($comisionID=null)
    {
        if($comisionID)
        {
            $comision = Comision::findOrFail($comisionID);
            $this->titulo = $comision->titulo;
            $this->contacto = $comision->contacto;
            $this->url_local = $comision->url_local;
            $this->descripcion = $comision->descripcion;
            $this->comision_id = $comision->id;
        }
    }

    public function render()
    {
        return view('livewire.comisiones.create');
    }

    public function store()
    {
        $this->validate();

        if($this->comision_id)
        {
            $comision = Comision::findOrFail($this->comision_id);
            $comision->titulo = $this->titulo;
            $comision->contacto = $this->contacto;
            $comision->url_local = $this->url_local;
            $comision->descripcion = $this->descripcion;

            $comision->save();

        }else{
            $comision = Comision::create([
                    'titulo'=>$this->titulo,
                    'contacto'=>$this->contacto,
                    'url_local'=>$this->url_local,
                    'descripcion'=>$this->descripcion,
                ]);
        }

    }

    public function resetInputFields()
    {
        $this->titulo = '';
        $this->contacto = '';
        $this->url_local = '';
        $this->descripcion = '';
    }

    public function comisionEdit($cID)
    {
        dd($cID);
    }


}
