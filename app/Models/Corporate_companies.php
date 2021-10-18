<?php

namespace App\Models;

use App\Models\Corporate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporate_companies extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'corporate_id' ,
        'S_razon_social' ,
        'S_rfd' ,
        'S_pais' ,
        'S_estado' ,
        'S_municipio' ,
        'S_colonia_localidad' ,
        'S_domicilio' ,
        'S_codigo_postal' ,
        'S_uso_cfdi' ,
        'S_url_rfc' ,
        'S_url_acta_constitutiva',
        'activo' ,
        'S_comentarios' 
    ];

    protected $dates = ['deleted_at'];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }
    
}
