<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    // Los campos que queremos evitar que se llenen por asignación con masiva
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'restaurante_id'
    ];

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
        return $this->belongsToMany(Pedido::class, 'pedido_plato')
        ->withPivot('cantidad');
    }

    //Relacion Uno a Uno polimórfica
    public function foto()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
