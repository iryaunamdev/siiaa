<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComisionDocumento extends Model
{
    use HasFactory;

    protected $table = 'comisiones_documentos';

    protected $fillable = ['titulo', 'fecha', 'tipo_id', 'comision_id', 'filename'];

    protected $dates = ['fecha'];

    public function comision()
    {
        return $this->belongsTo(Comision::class);
    }
}
