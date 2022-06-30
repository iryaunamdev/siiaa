<?php

namespace App\Models\persona;

use App\Models\Persona;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PosdocTutor extends Model
{
    use HasFactory;
    use LogsActivity;
    use Loggable;

    protected $table = 'posdocs_tutores';

    protected $fillable = ['persona_id', 'tutor_id', 'externo'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Persona::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['persona_id', 'tutor_id', 'externo']);
    }
}
