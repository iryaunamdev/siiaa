<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Comision extends Model
{
    use HasFactory;
    use Loggable;
    use LogsActivity;


    protected $table = 'comisiones';

    protected $guarded = [];

    protected $fillable = [
        'titulo', 'contacto', 'descripcion', 'url_local',
    ];

    public function integrantes()
    {
        return $this->hasMany(Comision\Integrante::class);
    }

    public function documentos()
    {
        return $this->hasMany(Comision\Documento::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['titulo', 'contacto', 'descripcion', 'url_local']);
    }
}
