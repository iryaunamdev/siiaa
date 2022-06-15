<?php

namespace App\Models\Comisiones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Documento extends Model
{
    use HasFactory;
    use Loggable;
    use LogsActivity;

    protected $table = 'comisiones_documentos';

    protected $fillable = ['titulo', 'fecha', 'tipo_id', 'comision_id', 'filename'];

    protected $dates = ['fecha'];

    public function comision()
    {
        return $this->belongsTo(Comision::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['titulo', 'fecha', 'tipo_id', 'comision_id', 'filename']);
    }


}
