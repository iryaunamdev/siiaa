<?php

namespace App\Http\Livewire\Configuraciones;

use App\Models\ConfiguracionCatalogo;
use App\Models\ConfiguracionCatalogoItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Catalogos extends Component
{
    use WireToast;

    protected $rules = [
        'name'=>'required',
        'clave'=>'required|max:8',
    ];

    public $verifiedRoles = [
        'Superadmin',
        'Administrador',
    ];
    public $catalogos;
    public $name, $clave, $catalogo_id, $catalogo;
    public $item, $item_id, $item_name, $item_clave;

    public $editMode = false;
    public $editItem = false;


    public function render()
    {
        if(Auth::user()->hasanyrole($this->verifiedRoles)){
            $this->catalogos = ConfiguracionCatalogo::all();
            return view('livewire.configuraciones.catalogos');
        }else{
            return abort('403', 'Usuario no autorizado');
        }

    }

    public function store()
    {
        $this->validate();

        $catalogo = ConfiguracionCatalogo::updateOrCreate(['id' => $this->catalogo_id],[
            'name'=>$this->name,
            'clave'=>$this->clave,
        ]);

        $this->resetInputs();
        $this->emit('saved');
        toast()->success('El catalogo se actualizo correctamente.')->push();
        $this->editMode=false;
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->clave = '';
        $this->catalogo_id = '';
    }

    public function addItem($catalgoID)
    {
        $this->editItem = true;
        $this->catalogo_id = $catalgoID;
        $this->catalogo = ConfiguracionCatalogo::findOrfail($this->catalogo_id);
    }

    public function storeItem()
    {
        $this->validate([
            'item_name' => 'required',
        ]);

        $item = ConfiguracionCatalogoItem::updateOrCreate(['id'=>$this->item_id],[
            'name'=>$this->item_name,
            'clave'=>$this->item_clave,
            'catalogo_id'=>$this->catalogo_id,
        ] );

        $this->resetItemInputs();
        toast()->success('Se actualizaron los elementos del catalogo '.$this->catalogo->clave)->push();
        $this->editItem = false;

    }

    public function resetItemInputs()
    {
        $this->item_name = '';
        $this->item_clave = '';
        $this->item_id = '';
    }
}
