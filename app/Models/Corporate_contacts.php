<?php

namespace App\Models;

use App\Models\Corporate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corporate_contacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_id',
        'S_nombre',
        'S_puesto',
        'S_comentarios',
        'S_telefono_fijo',
        'S_telefono_movil',
        'S_email'
    ];
    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }
}
