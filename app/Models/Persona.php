<?php

namespace App\Models;

use App\Models\Configuracion\CatalogoItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Persona extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = "personas";

    protected $fillable = [
        'nombre', 'apellidop', 'apellidom', 'curp', 'rfc', 'fecha_nacimiento', 'nacionalidad_id', 'escolaridad_id', 'sexo_id', 'active'
    ];

    protected $dates =['fecha_nacimiento'];

    public function escolaridad()
    {
        return $this->belongsTo(CatalogoItems::class, 'escolaridad_id');
    }

    public function nacionalidad()
    {
        return $this->belongsTo(CatalogoItems::class, 'nacionalidad_id');
    }

    public function sexo()
    {
        return $this->belongsTo(CatalogoItems::class, 'sexo_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nombre', 'apellidop', 'apellidom', 'curp', 'rfc', 'fecha_nacimiento', 'nacionalidad_id', 'escolaridad_id', 'sexo_id', 'active']);
    }
}
