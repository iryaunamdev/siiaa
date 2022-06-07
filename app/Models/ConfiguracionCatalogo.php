<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionCatalogo extends Model
{
    use HasFactory;

    protected $table= "catalogos";

    protected $fillable = [
        'clave', 'name', 'active','model', 'active'
    ];

    public function items()
    {
        return $this->hasMany(ConfiguracionCatalogoItem::class, 'catalogo_id', 'id');
    }

}
