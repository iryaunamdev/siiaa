<?php

namespace App\Http\Livewire\Posdoc;

use App\Models\persona\PosdocBeca;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Becas extends Component
{
    use WireToast;

    protected $listeners = [
        'addBeca',
        'closeModalEdit'
    ];

    public $beca_id, $persona_id, $fecha_inicio, $fecha_fin, $becaPos_id;
    public $editMode = false;


    public function render()
    {
        return view('livewire.posdoc.becas');
    }

    public function editBecaPos(Becas $becaPos)
    {
        if($becaPos)
        {
            $this->beca_id = $becaPos->beca_id;
            $this->persona_id = $becaPos->persona_id;
            $this->fecha_inicio = $becaPos->fecha_inicio ? $becaPos->fecha_inicio->format('Y-m-d') : $becaPos->fecha_inicio;
            $this->fecha_fin = $becaPos->fecha_fin ? $becaPos->feccha_fin->format('Y-m-d') : $becaPos->feecha_fin;

            $this->becaPos_id = $becaPos->id;
        }

        $this->editMode = true;
    }

    public function storeBecaPos()
    {
        $this->validate([
            'persona_id'=>'required',
            'beca_id' => 'required',
        ]);

        PosdocBeca::updateOrCreate(['id' => $this->becaPos_id],
        [
            'persona_id'=>$this->persona_id,
            'beca_id' => $this->beca_id,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ]);

        $this->editMode = false;
        toast()->info('Se añadió/modificó registro de beca de posdoc.')->push();
    }

    public function addBeca()
    {
        $this->emitTo('posdoc.tutores', 'closeModalEdit');
        $this->editMode = true;
    }

    public function closeModalEdit()
    {
        $this->editMode = false;
    }
}
