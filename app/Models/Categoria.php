<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // En la ruta en vez de que prezca el id parecerá el nombre
    /*
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    */

    // Relación uno a muchos
    public function platos(){
        return $this->hasMany(Plato::class);
    }
}
