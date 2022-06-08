<?php

namespace App\Http\Livewire\Comisiones;

use App\Models\ComisionDocumento;
use App\Models\ConfiguracionCatalogo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Documentos extends Component
{
    use WithFileUploads;

    protected $listeners = ['editarDocumento'];
    protected $rules = [
        'titulo'=>'required',
        'tipo_id'=>'required',
        'file'=>'required',
        'fecha'=>'required|date',
    ];

    public $badge_colors = [
        'bg-indigo-600',
        'bg-blue-600',
        'bg-sky-600',
        'bg-cyan-600',
    ];
    public $titulo, $tipo_id, $fecha, $file, $documento_id;
    public $comisiones, $comision_id;
    public $documentos, $tipo_docs;

    public $editMode = 0;


    public function render()
    {

        if($this->comision_id){
            $this->documentos = ComisionDocumento::where('comision_id', $this->comision_id)->get();
        }
        $this->tipo_docs = ConfiguracionCatalogo::where('clave', 'COMTDOC')->first()->items;
        return view('livewire.comisiones.documentos');
    }

    public function store()
    {
        $this->validate();

        $filenameTXT = str_pad($this->comision_id, 6, "0", STR_PAD_LEFT).'_';
        $filenameTXT .= str_pad($this->tipo_id, 3, "0", STR_PAD_LEFT).'_';
        $filenameTXT .= str_replace('-', '',  $this->fecha);
        $filenameTXT .= Carbon::now()->format('His');
        $filenameTXT .= '.'.$this->file->getClientOriginalExtension();

        $this->file->storeAs('comisiones', $filenameTXT, 'public');

        ComisionDocumento::create([
            'titulo' => $this->titulo,
            'tipo_id'=> $this->tipo_id,
            'comision_id'=>$this->comision_id,
            'fecha'=>$this->fecha,
            'filename'=>$filenameTXT,
        ]);

        $this->editMode = false;
    }

    public function editarDocumento($docID)
    {
        $this->editMode = true;
    }


}
