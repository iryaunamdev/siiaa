<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;

    protected $table = 'comisiones';

    protected $guarded = [];

    protected $fillable = [
        'titulo', 'contacto', 'descripcion', 'url_local',
    ];

    public function integrantes()
    {
        return $this->hasMany(ComisionIntegrante::class);
    }

    public function documentos()
    {
        return $this->hasMany(ComisionDocumento::class);
    }
}
