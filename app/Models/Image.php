<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // asignación masiva
    protected $fillable = ['url'];

    //Relacion polimórfica
    public function imageable()
    {
        return $this->morphTo();
    }
}
