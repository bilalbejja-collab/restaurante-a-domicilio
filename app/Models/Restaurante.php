<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'telefono',
        'latitud',
        'longitud'
    ];

    // En la ruta en vez de que prezca el id parecerá el nombre
    /*
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    */

    //Relation Uno a Muchos
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
