<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    //Relacion Uno a Muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion Uno a Muchos inversa
    public function repartidor()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion Uno a Muchos inversa
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    //Relacion Muchos a Muchos
    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'pedido_plato')
            ->withPivot('cantidad');
    }
}
