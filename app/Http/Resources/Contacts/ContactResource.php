<?php

namespace App\Http\Resources\Contacts;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $contact = $this;
        return [
            'corporate_id' => $contact->corporate_id,
            'S_nombre' => $contact->S_nombre,
            'S_puesto' => $contact->S_puesto,
            'S_comentarios' => $contact->S_comentarios,
            'S_telefono_fijo' => $contact->S_telefono_fijo,
            'S_telefono_movil' => $contact->S_telefono_movil,
            'S_email' => $contact->S_email

        ];
    }
}
