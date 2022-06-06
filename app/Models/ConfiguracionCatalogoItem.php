<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionCatalogoItem extends Model
{
    use HasFactory;

    protected $table = "catalogos_items";

    protected $fillable = ['catalogo_id', 'name', 'clave', 'active'];

    public function catalogo()
    {
        return $this->belongsTo(ConfiguracionCatalogo::class);
    }
}
