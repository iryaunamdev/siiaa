<?php

namespace App\Http\Livewire\Posdoc;

use Livewire\Component;

class Tutores extends Component
{
    protected $listeners = ['addTutor', 'closeModalEdit'];

    public $editMode = false;

    public function render()
    {
        return view('livewire.posdoc.tutores');
    }

    public function addTutor()
    {
        $this->emitTo('posdoc.becas', 'closeModalEdit');
        $this->editMode = true;
    }

    public function closeModalEdit()
    {
        $this->editMode = false;
    }
}
