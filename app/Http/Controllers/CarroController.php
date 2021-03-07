<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Restaurante;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Mail;

class CarroController extends Controller
{

    public function add(Request $request)
    {
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
        return back()->with(['info' => "\"$plato->nombre\" ¡se ha agregado con éxito al carrito de compra!", 'color' => 'green']);
    }

    /**
     * Ver carrito
     */
    public function verCarro()
    {
        return view('carrito.checkout');
    }


    /**
     * Borrar un plato del carrito
     */
    public function borrarItem(Request $request)
    {
        Cart::remove([
            'id' => $request->id
        ]);

        return back()->with(['info' => 'Plato eliminado con éxito de su carrito!', 'color' => 'green']);
    }

    /**
     * Limpiar carrito
     */
    public function limpiarCarro()
    {
        Cart::clear();
        return back()->with('success', 'Carrito de compra vacío');
    }

    /**
     * Comprar los platos
     */
    public function comprarPlatos(Request $request)
    {
        // Saco el cliente para luego pasarlo a enviarEmail()
        $cliente = User::where('id', $request['cliente_id'])->first();

        $plato = Plato::where('id', $request->plato_id)->first();

        // Asigno un repeartidor libre al azar
        $rnd_repartidor = User::role('Repartidor')
            ->where('estado', 'libre')
            ->get();

        $request['estado'] = 'recibido';
        $request['restaurante_id'] = $plato['restaurante_id'];
        // Cuando no hay ningun repartidor disponible asigno 0
        $request['repartidor_id'] = count($rnd_repartidor) == 0 ? 0 :  $rnd_repartidor->random()->id;

        // Se crea el pedido
        $pedido = Pedido::create($request->all());

        // Se guradan las lineas de pedidos
        foreach (Cart::getContent() as $plato) {
            $pedido->platos()->attach(
                $plato['id'],
                ['cantidad' => $plato['quantity']]
            );
        }

        // Enviar email
        $this->enviarEmail($cliente, $pedido);

        // Después de comprar limpio el carrito
        $this->limpiarCarro();

        return back()->with(['info' => 'Pedido realizado correctamente!', 'color' => 'green']);
    }

    /**
     * Esta función la hice para probar enviar email
     */
    public function enviarEmail($cliente, $pedido)
    {
        $restaurante = Restaurante::where('id', $pedido->restaurante_id)->first();

        $details = [
            'restaurante' => $restaurante,
            'cliente' => $cliente,
            'pedido' => $pedido
        ];

        Mail::to($cliente->email)->send(new EmailConfirm($details));
        return 'Email enviado con éxito';

    }
}
