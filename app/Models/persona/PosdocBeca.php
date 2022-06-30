<?php

namespace App\Models\persona;

use App\Models\Configuracion\CatalogoItems;
use App\Models\Persona;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PosdocBeca extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = 'posdocs_becas';

    protected $fillable = ['persona_id', 'beca_id', 'fecha_inicio', 'fecha_fin'];

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function beca()
    {
        return $this->hasOne(CatalogoItems::class);
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['persona_id', 'beca_id', 'fecha_inicio', 'fecha_fin']);
    }
}
