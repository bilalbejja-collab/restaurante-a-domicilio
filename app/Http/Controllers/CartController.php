<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Plato;
use Darryldecode\Cart\Cart as CartCart;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $plato = Plato::find($request->plato_id);
        Cart::add(
            $plato->id,
            $plato->nombre,
            $plato->precio,
            1,
            array("urlfoto" => "url(storage/" . $plato->foto->url . ")")
        );

        return back()->with('success', "$plato->nombre !se ha agregado con éxito al carrito de compra!");
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
