<?php

namespace App\Models\persona;

use App\Models\Configuracion\CatalogoItems;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Ingresos extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = 'personas_ingresos';

    protected $fillable = ['tipo_id', 'persona_id', 'clave', 'email', 'contrato_id', 'nombramiento_id', 'fecha_alta', 'fecha_baja', 'orcid', 'sni_id', 'pride_id', 'pride_y'];

    protected $dates = ['fecha_alta', 'fecha_baja'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function tipo()
    {
        return $this->hasOne(CatalogoItems::class);
    }

    public function contrato()
    {
        return $this->hasOne(CatalogoItems::class);
    }

    public function nombramiento()
    {
        return $this->hasOne(CatalogoItems::class);
    }

    public function sni()
    {
        return $this->hasOne(CatalogoItems::class);
    }

    public function pride()
    {
        return $this->hasOne(CatalogoItems::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['tipo_id', 'persona_id', 'clave', 'email', 'contrato_id', 'nombramiento_id', 'fecha_alta', 'fecha_baja', 'orcid', 'sni_id', 'pride_id', 'pride_y']);
    }
}
