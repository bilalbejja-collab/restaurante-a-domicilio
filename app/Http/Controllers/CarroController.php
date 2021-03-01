<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\User;
use Cart;

class CarroController extends Controller
{

    public function add(Request $request)
    {
        $restauranteCarro = null;

        $plato = Plato::findorfail($request->plato_id);

        if (count(Cart::getContent()) > 0) {
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
            array("urlfoto" => "storage/" . $plato->foto->url)
        );
        return back()->with(['info' => "\"$plato->nombre\" se ha agregado con éxito al carrito de compra!", 'color' => 'green']);
    }

    /**
     * Ver carrito
     */
    public function verCarro()
    {
        return view('checkout');
    }


    /**
     * Borrar un plato del carrito
     */
    public function borrarItem(Request $request)
    {
        Cart::remove([
            'id' => $request->id
        ]);

        return back()->with('success', "Plato eliminado con éxito de su carrito.");
    }

    /**
     * Limpiar carrito
     */
    public function limpiarCarro()
    {
        Cart::clear();
        return back()->with('success', "Carrito de compra limpiado");
    }

    /**
     * Comprar los platos
     */
    public function comprarPlatos(Request $request)
    {
        $plato = Plato::where('id', $request->plato_id)->first();

        // Coger un repeartidor libre al azar
        $rnd_repartidor = User::role('Repartidor')
            ->where('estado', 'libre')
            ->get()->random()->id;

        $request['estado'] = 'recibido';
        $request['restaurante_id'] = $plato['restaurante_id'];
        $request['repartidor_id'] = $rnd_repartidor;

        foreach (Cart::getContent() as $plato) {
            Pedido::create($request->all());
        }

        $this->limpiarCarro();

        return back()->with('success', "Carrito de compra limpiado");
    }
}
