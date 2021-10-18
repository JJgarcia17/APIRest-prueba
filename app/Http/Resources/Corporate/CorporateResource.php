<?php

namespace App\Http\Resources\Corporate;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $corporate = $this;
        return [
            'id' => $corporate->id,
            'user_id' => $corporate->user_id,
            'S_nombre_corto' => $corporate->S_nombre_corto,
            'S_nombre_completo' => $corporate->S_nombre_completo,
            'S_logo_url' => $corporate->S_logo_url,
            'S_db_name' => $corporate->S_db_name,
            'S_db_usuario' => $corporate->S_db_usuario,
            'S_db_password' => $corporate->S_db_password,
            'S_system_url' => $corporate->S_system_url,
            'S_activo' => $corporate->S_activo,
            'D_fecha_incorporacion' => $corporate->D_fecha_incorporacion
        ];
    }
}
