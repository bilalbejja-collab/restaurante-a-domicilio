<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Plato;
use App\Models\Restaurante;

use Illuminate\Support\Facades\Cache;

class PlatoController extends Controller
{
    public function index()
    {
        if (request()->page) {
            $key = 'platos' . request()->page;
        } else {
            $key = 'platos';
        }

        // Saco los platos de la cache
        // Si es la primera vez hago la consulta DB y guardo el resultado en la cache
        if (Cache::has($key)) {
            $platos = Cache::get($key);
        } else {
            $platos = Plato::latest('id')->paginate(8);
            Cache::put('platos', $platos);
        }

        return view('platos.index', compact('platos'));
    }

    public function show(Plato $plato)
    {
        $similares = Plato::where('categoria_id', $plato->categoria_id)
            ->where('id', '!=', $plato->id)
            ->latest('precio')
            ->take(4)
            ->get();
        return view('platos.show', compact('plato', 'similares'));
    }

    public function categoria(Categoria $categoria, Restaurante $restaurante)
    {
        $platos = Plato::where('categoria_id', $categoria->id)->where('restaurante_id', $restaurante->id)->latest('id')->paginate(2);

        return view('platos.categoria', compact('platos', 'categoria'));
    }

    public function restaurante(Restaurante $restaurante)
    {
        $platos = Plato::where('restaurante_id', $restaurante->id)->latest('id')->paginate(2);

        return view('platos.restaurante', compact('platos', 'restaurante'));
    }
}
