<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this;
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email'=> $user->email,
            'S_nombres' => $user->S_nombres,
            'S_apellidos' => $user->S_apellidos,
            'S_foto_perfil_url'=> $user->S_foto_perfil_url,
            'S_activo'=> $user->S_activo,
            'verifed' => $user->verifed,
            'verification_token' => $user->verification_token
        ];
    }
}
