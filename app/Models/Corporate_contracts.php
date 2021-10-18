<?php

namespace App\Models;

use App\Models\Corporate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corporate_contracts extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_id',
        'S_url_contrato',
        'D_fecha_inicio',
        'D_fecha_fin',
    ];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }
}
