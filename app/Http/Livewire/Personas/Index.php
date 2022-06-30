<?php

namespace App\Http\Livewire\Personas;

use App\Models\Persona;
use Livewire\Component;

class Index extends Component
{

    public $persona_id, $personas;

    public function mount($personaID=null)
    {
        if($personaID)
        {
            $this->persona_id = $personaID;
        }
    }

    public function render()
    {
        $this->personas = Persona::all();
        return view('livewire.personas.index');
    }
}
