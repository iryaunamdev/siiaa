<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComisionIntegrante extends Model
{
    use HasFactory;

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

}
