<?php

namespace App\Http\Resources\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $contract = $this;
        return [
            'id' => $contract->id,
            'corporate_id' => $contract->corporate_id,
            'S_url_contrato' => $contract->S_url_contrato,
            'D_fecha_inicio' => $contract->D_fecha_inicio,
            'D_fecha_fin' => $contract->D_fecha_fin,
        ];
    }
}
