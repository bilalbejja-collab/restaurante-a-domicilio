<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    //Relacion Uno a Muchos inversa
    public function restaurante(){
        return $this->belongsTo(Restaurante::class);
    }

    //Relacion Uno a Muchos inversa
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relacion Muchos a Muchos
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }

    //Relacion Uno a Uno polimórfica
    public function foto()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
