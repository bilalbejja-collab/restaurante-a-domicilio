<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PlatoResource;
use App\Models\Plato;

class RestauranteResource extends JsonResource
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
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'platos' => PlatoResource::collection(Plato::where('restaurante_id', $this->id)->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
