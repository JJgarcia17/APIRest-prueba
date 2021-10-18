<?php

namespace App\Http\Resources\Companies;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $companie = $this;
        return [
            'corporate_id' =>$companie->corporate_id,
            'S_razon_social' =>$companie->S_razon_social,
            'S_rfd' =>$companie->S_rfd,
            'S_pais' =>$companie->S_pais,
            'S_estado' =>$companie->S_estado,
            'S_municipio' =>$companie->S_municipio,
            'S_colonia_localidad' =>$companie->S_colonia_localidad,
            'S_domicilio' =>$companie->S_domicilio,
            'S_codigo_postal' =>$companie->S_codigo_postal,
            'S_uso_cfdi' =>$companie->S_uso_cfdi,
            'S_url_rfc' =>$companie->S_url_rfc,
            'S_url_acta_constitutiva' =>$companie->S_url_acta_constitutiva,
            'activo' =>$companie->activo,
            'S_comentarios' =>$companie->S_comentarios
        ];
    }
}
