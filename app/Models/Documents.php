<?php

namespace App\Models;

use App\Models\Corporate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'S_nombre',
        'N_obligatorio',
        'S_descripcion',
    ];
    public function corporate()
    {
        return $this->belongsToMany(Corporate::class)->withPivot('S_archivo_url');
    }
}
