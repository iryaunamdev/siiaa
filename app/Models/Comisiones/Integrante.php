<?php

namespace App\Models\Comisiones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Integrante extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = 'comisiones_integrantes';

    protected $fillable = [
        'comision_id', 'nombre', 'puesto'
    ];

    protected $dates = [
        'fecha'
    ];

    public function comision()
    {
        return $this->belongsTo(Comision::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['comision_id', 'nombre', 'puesto']);
    }
}
