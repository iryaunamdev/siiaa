<?php

namespace App\Models\Configuracion;

use App\Models\Configuracion\Catalogo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class CatalogoItems extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = "catalogos_items";

    protected $fillable = ['catalogo_id', 'name', 'clave', 'active'];

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['catalogo_id', 'name', 'clave', 'active']);
    }
}
