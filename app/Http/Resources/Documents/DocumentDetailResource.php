<?php

namespace App\Http\Resources\Documents;

use App\Models\Corporate;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   $document = $this;
        return [
            'id' =>$document->id,
            'S_nombre' => $document->S_nombre,
            'N_obligatorio' => $document->N_obligatorio,
            'S_descripcion' => $document->S_descripcion,
            'corporate' => $document->corporate,
            
        ];
    }
}
