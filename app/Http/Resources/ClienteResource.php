<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dni' => $this->dni,
            'nombre' => $this->name,
            'apellidos' => $this->lastname,
            'email' => $this->email,
            'direccion' => $this->address,
            'ciudad' => $this->city,
            'telefono' => $this->movil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
