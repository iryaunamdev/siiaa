<?php

namespace App\Http\Livewire\Personas;

use App\Models\Configuracion\CatalogoItems;
use App\Models\Persona;
use App\Models\persona\Ingresos;
use Carbon\Carbon;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use Usernotnull\Toast\Toast;

class CRUD extends Component
{
    use WireToast;

    public $persona_id, $persona;
    public $nombre, $apellidop, $apellidom, $curp, $rfc, $fecha_nacimiento, $nacionalidad_id, $escolaridad_id, $sexo_id;
    public $tipo_id, $clave, $email, $contrato_id, $nombramiento_id, $fecha_alta, $fecha_baja, $orcid, $sni_id, $pride_id, $pride_y;

    public $tipos_personal, $tipo_clave;

    public function mount($personaID = null)
    {
        $this->tipos_personal = CatalogoItems::where('catalogo_id', 3)
                                                ->where('active', 1)
                                                ->get()
                                                ->sortBy('name'); //Select from catalogo TIPO DE PERSONAL
        $this->persona_id = $personaID;

        if($personaID)
        {
            $persona = Persona::findOrFail($this->persona_id);
            $this->persona = $persona;
            $this->personal_id = $persona->id;
            $this->nombre = $persona->nombre;
            $this->apellidop = $persona->apellidop;
            $this->apellidom = $persona->apellidom;
            $this->rfc = $persona->rfc;
            $this->curp = $persona->curp;
            $this->fecha_nacimiento = $persona->fecha_nacimiento ? $persona->fecha_nacimiento->format('Y-m-d'): $persona->fecha_nacimiento;
            $this->nacionalidad_id = $persona->nacionalidad_id;
            $this->escolaridad_id = $persona->escolaridad_id;
            $this->sexo_id = $persona->sexo_id;

            if($persona->ingreso != null)
            {
                $this->tipo_id = $persona->ingreso->tipo_id;
                $this->tipo_clave = $this->tipos_personal->where('id', $this->tipo_id)->first()->clave;
            }

        }
    }

    public function render()
    {
        return view('livewire.personas.c-r-u-d');
    }

    public function storePersona()
    {

        $this->validate([
            'nombre'=>'required',
            'apellidop'=>'required',
            'fecha_nacimiento'=> 'date'
        ]);

        $persona = Persona::updateOrCreate(['id'=>$this->personal_id],
        [
            'nombre'           => $this->nombre,
            'apellidop'        => $this->apellidop,
            'apellidom'        => $this->apellidom,
            'curp'             => $this->curp,
            'rfc'              => $this->rfc,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'nacionalidad_id'  => $this->nacionalidad_id,
            'escolaridad_id'   => $this->escolaridad_id,
            'sexo_id'          => $this->sexo_id,
        ]);

        if($this->tipo_id)
        {
            $this->validate([
                'tipo_id' => 'required',
                'personal_id' => 'required'
            ]);

            if($persona->ingreso){
                $ingreso = Ingresos::findOrFail($persona->ingreso->id);
                $ingreso->clave = $this->clave;
                $ingreso->email = $this->email;
                $ingreso->contrato_id = $this->contrato_id;
                $ingreso->nombramiento_id = $this->nombramiento_id;
                $ingreso->fecha_alta = $this->fecha_alta;
                $ingreso->fecha_baja = $this->fecha_baja;
                $ingreso->orcid = $this->orcid;
                $ingreso->sni_id = $this->sni_id;
                $ingreso->pride_id = $this->pride_id;
                $ingreso->pride_y = $this->pride_y;
                $ingreso->save();

            }else{
                Ingresos::create([
                    'tipo_id' => $this->tipo_id,
                    'persona_id' => $this->personal_id,
                    'clave' => $this->clave,
                    'email' => $this->email,
                    'contrato_id' => $this->contrato_id,
                    'nombramiento_id' => $this->nombramiento_id,
                    'fecha_alta' => $this->fecha_alta,
                    'fecha_baja' => $this->fecha_baja,
                    'orcid' => $this->orcid,
                    'sni_id' => $this->sni_id,
                    'pride_id' => $this->pride_id,
                    'pride_y' => $this->pride_y,
                ]);
            }
        }

        $this->editMode = false;
        toast()->info('El usuario se creó/acualizó correctamente')->push();
    }

    //Events
    public function tipoPersonalEvent($tipo_id = null)
    {
        if($tipo_id)
        {
            $this->tipo_clave = $this->tipos_personal->where('id', $tipo_id)->first()->clave;
        }
        else
        {
            $this->tipo_clave = null;
        }

        $this->tipo_id = $tipo_id;
    }

    /*
    public $personas, $personal_id;
    public $nombre, $apellidop, $apellidom, $curp, $rfc, $fecha_nacimiento, $nacionalidad_id, $escolaridad_id, $sexo_id;
    public $tipo_id, $clave, $email, $contrato_id, $nombramiento_id, $fecha_alta, $fecha_baja, $orcid, $sni_id, $pride_id, $pride_y;

    public $tipos_personal, $tipo_clave;
    public $editMode = false;

    public function render()
    {
        $this->personas = Persona::all();
        $this->tipos_personal = CatalogoItems::where('catalogo_id', 3)
                                                ->where('active', 1)
                                                ->get()
                                                ->sortBy('name'); //Select from catalogo TIPO DE PERSONAL
        return view('livewire.personas.c-r-u-d');
    }

    public function editarPersona(Persona $persona)
    {
        $this->editMode = true;

        if($persona)
        {
            $this->personal_id = $persona->id;
            $this->nombre = $persona->nombre;
            $this->apellidop = $persona->apellidop;
            $this->apellidom = $persona->apellidom;
            $this->rfc = $persona->rfc;
            $this->curp = $persona->curp;
            $this->fecha_nacimiento = $persona->fecha_nacimiento ? $persona->fecha_nacimiento->format('Y-m-d'): $persona->fecha_nacimiento;
            $this->nacionalidad_id = $persona->nacionalidad_id;
            $this->escolaridad_id = $persona->escolaridad_id;
            $this->sexo_id = $persona->sexo_id;
        }

        if($persona->ingreso)
        {
            $this->tipo_id = $persona->ingreso->tipo_id;
            $this->tipo_clave = $this->tipos_personal->where('id', $this->tipo_id)->first()->clave;
        }
    }

    public function storePersona()
    {

        $this->validate([
            'nombre'=>'required',
            'apellidop'=>'required',
            'fecha_nacimiento'=> 'date'
        ]);

        $persona = Persona::updateOrCreate(['id'=>$this->personal_id],
        [
            'nombre'           => $this->nombre,
            'apellidop'        => $this->apellidop,
            'apellidom'        => $this->apellidom,
            'curp'             => $this->curp,
            'rfc'              => $this->rfc,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'nacionalidad_id'  => $this->nacionalidad_id,
            'escolaridad_id'   => $this->escolaridad_id,
            'sexo_id'          => $this->sexo_id,
        ]);

        if($this->tipo_id)
        {
            $this->validate([
                'tipo_id' => 'required',
                'personal_id' => 'required'
            ]);

            if($persona->ingreso){
                $ingreso = Ingresos::findOrFail($persona->ingreso->id);
                $ingreso->clave = $this->clave;
                $ingreso->email = $this->email;
                $ingreso->contrato_id = $this->contrato_id;
                $ingreso->nombramiento_id = $this->nombramiento_id;
                $ingreso->fecha_alta = $this->fecha_alta;
                $ingreso->fecha_baja = $this->fecha_baja;
                $ingreso->orcid = $this->orcid;
                $ingreso->sni_id = $this->sni_id;
                $ingreso->pride_id = $this->pride_id;
                $ingreso->pride_y = $this->pride_y;
                $ingreso->save();

            }else{
                Ingresos::create([
                    'tipo_id' => $this->tipo_id,
                    'persona_id' => $this->personal_id,
                    'clave' => $this->clave,
                    'email' => $this->email,
                    'contrato_id' => $this->contrato_id,
                    'nombramiento_id' => $this->nombramiento_id,
                    'fecha_alta' => $this->fecha_alta,
                    'fecha_baja' => $this->fecha_baja,
                    'orcid' => $this->orcid,
                    'sni_id' => $this->sni_id,
                    'pride_id' => $this->pride_id,
                    'pride_y' => $this->pride_y,
                ]);
            }
        }

        $this->editMode = false;
        toast()->info('El usuario se creó/acualizó correctamente')->push();
    }

    //Events
    public function tipoPersonalEvent($tipo_id = null)
    {
        if($tipo_id)
        {
            $this->tipo_clave = $this->tipos_personal->where('id', $tipo_id)->first()->clave;
        }
        else
        {
            $this->tipo_clave = null;
        }

        $this->tipo_id = $tipo_id;
    }
    */
}
