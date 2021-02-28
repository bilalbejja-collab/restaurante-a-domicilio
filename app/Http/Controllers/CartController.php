<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;
use Cart;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $restauranteCarro = null;

        $plato = Plato::findorfail($request->plato_id);

        if (count(Cart::getContent())>0) {
            $plato_carro_id = Cart::getContent()->first()->id;
            $plato_carro = Plato::find($plato_carro_id);
            $restaurante_carro = $plato_carro->restaurante;

            if (!empty($restaurante_carro)) {
                if ($plato->restaurante->id != $restaurante_carro->id) {
                    return back()->with(['info' => 'No se pueden añadir platos de diferentes restaurantes', 'color' => 'red']);
                }
            }
        }

        Cart::add(
            $plato->id,
            $plato->nombre,
            $plato->precio,
            1,
            array("urlfoto" => "storage/" . $plato->foto->url )
        );
        return back()->with(['info' => "\"$plato->nombre\" se ha agregado con éxito al carrito de compra!", 'color' => 'green']);
    }

    public function cart()
    {
        return view('checkout');
    }


    public function removeitem(Request $request)
    {
        Cart::remove([
            'id' => $request->id
        ]);

        return back()->with('success', "Plato eliminado con éxito de su carrito.");
    }


    public function clear()
    {
        Cart::clear();
        return back()->with('success', "...");
    }
}
