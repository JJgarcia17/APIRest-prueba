<?php

namespace App\Models;

use App\Models\User;
use App\Models\Documents;
use App\Models\Corporate_contacts;
use App\Models\Corporate_companies;
use App\Models\Corporate_contracts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporate extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'user_id',
        'S_nombre_corto',
        'S_nombre_completo',
        'S_logo_url',
        'S_db_name',
        'S_db_usuario',
        'S_db_password',
        'S_system_url',
        'S_activo',
        'D_fecha_incorporacion'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relationship of many to many corporations and documents

    public function companies()
    {
        return $this->hasMany(Corporate_companies::class);
    }

    public function documents(){
        return $this->belongsToMany(Documents::class)->withPivot('S_archivo_url');
    }

    public function contracts()
    {
        return $this->hasMany(Corporate_contracts::class);
    }

    public function contacts()
    {
        return $this->hasMany(Corporate_contacts::class);
    }

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

}


