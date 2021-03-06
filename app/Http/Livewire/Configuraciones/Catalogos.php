<?php

namespace App\Http\Livewire\Configuraciones;

use App\Models\Configuracion\Catalogo;
use App\Models\Configuracion\CatalogoItems;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Catalogos extends Component
{
    use WireToast;

    public $verifiedRoles = [
        'Superadmin',
        'Administrador',
    ];

    public $catalogos;
    public $name, $clave, $catalogo_id, $catalogo;
    public $item, $item_id, $item_name, $item_clave;

    public $editMode = false;
    public $editItem = false;
    public $deleteItemModal = false, $deleteCatalogoModal=false;



    public function render()
    {
        if(Auth::user()->hasanyrole($this->verifiedRoles)){
            $this->catalogos = Catalogo::all();
            return view('livewire.configuraciones.catalogos');
        }else{
            return abort('403', 'Usuario no autorizado');
        }

    }

    public function editCatalogo($id = null)
    {
        if($id){
            $catalogo = Catalogo::findOrFail($id);
            $this->name = $catalogo->name;
            $this->clave = $catalogo->clave;
            $this->catalogo = $catalogo;
        }
        $this->editMode=true;

    }

    public function storeCatalogo()
    {
        $this->validate([
            'name'=>'required',
            'clave'=>'required|max:8',
        ]);

        if($this->catalogo){
            $catalogo = Catalogo::findOrFail($this->catalogo->id);
            $catalogo->name = $this->name;
            $catalogo->clave = $this->clave;
            $catalogo->save();
        }else{
            $catalogo = Catalogo::Create([
                'name' => $this->name,
                'clave' => $this->clave,
            ]);
        }

        $this->resetCatalogoInputs();
        $this->emit('saved');
        toast()->success('El catalogo se actualizo correctamente.')->push();
        $this->editMode=false;
    }

    public function resetCatalogoInputs()
    {
        $this->name = '';
        $this->clave = '';
        $this->catalogo_id = '';
        $this->catalogo = "";
    }

    public function confirmDeleteCatalogo(Catalogo $catalogo)
    {
        $this->editMode = false;
        $this->deleteCatalogoModal = true;
        $this->catalogo = $catalogo;
    }

    public function deleteCatalogo()
    {
        CatalogoItems::where('catalogo_id', $this->catalogo->id)->delete();
        $this->catalogo->delete();

        toast()->success('El cat??logo y sus elementos fueron eliminados.')->push();
        $this->resetCatalogoInputs();
        $this->deleteCatalogoModal=false;
        $this->emit('catalogoDeletd');
    }

    public function addItem($catalgoID)
    {
        $this->editItem = true;
        $this->catalogo_id = $catalgoID;
        $this->catalogo = Catalogo::findOrfail($this->catalogo_id);
    }

    public function storeItem()
    {
        $this->validate([
            'item_name' => 'required',
            'item_clave' => 'required|max:8'
        ]);

        $item = CatalogoItems::updateOrCreate(['id'=>$this->item_id],[
            'name'=>$this->item_name,
            'clave'=>$this->item_clave,
            'catalogo_id'=>$this->catalogo_id,
        ] );

        $this->resetItemInputs();
        toast()->success('Se actualizaron los elementos del catalogo ')->push();
        $this->editItem = false;
        $this->emit('itemStored');

    }

    public function editItem($id)
    {
        $item = CatalogoItems::findOrFail($id);
        $this->item_name = $item->name;
        $this->item_clave = $item->clave;
        $this->item_id = $item->id;
        $this->catalogo_id = $item->catalogo_id;
        $this->item = $item;
        $this->editItem=true;

    }

    public function confirmDeleteItem(CatalogoItems $item)
    {
        $this->deleteItemModal = true;
        $this->item = $item;
    }

    public function deleteItem()
    {
        $this->item->delete();
        $this->deleteItemModal = false;
        toast()->success('Se elimin?? el elemento del cat??logo')->push();
        $this->emit('deletedItem');
    }

    public function resetItemInputs()
    {
        $this->item_name = '';
        $this->item_clave = '';
        $this->item_id = '';
        $this->catalogo_id = '';
    }
}
