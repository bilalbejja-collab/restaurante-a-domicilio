<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::latest('precio')->paginate(8);

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

    public function categoria(Categoria $categoria){
        $categorias = Plato::where('categoria_id', $categoria->id)->latest('id')->paginate(6);

        return view('platos.categoria', compact('categorias'));
    }
}