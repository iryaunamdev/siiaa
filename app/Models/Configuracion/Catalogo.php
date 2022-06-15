<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\Configuracion\CatalogoItems as ConfiguracionCatalogoItems;

class Catalogo extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table= "catalogos";

    protected $fillable = [
        'clave', 'name', 'active','model',
    ];

    public function items()
    {
        return $this->hasMany(ConfiguracionCatalogoItems::class, 'catalogo_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['clave', 'name', 'active' ]);
    }
}
