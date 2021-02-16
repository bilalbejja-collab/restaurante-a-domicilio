<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    //Relation Uno a Muchos
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
