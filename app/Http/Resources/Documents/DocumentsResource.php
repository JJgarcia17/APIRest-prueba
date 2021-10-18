<?php

namespace App\Http\Resources\Documents;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        $documents = $this;
        return [
            'id' =>$documents->id,
            'S_nombre' => $documents->S_nombre,
            'N_obligatorio' => $documents->N_obligatorio,
            'S_descripcion' => $documents->S_descripcion,
        ];
    }
}
