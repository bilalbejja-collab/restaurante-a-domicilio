<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repartidor;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = [
            'libre' => 'Estado libre',
            'ocupado' => 'Estado ocupado'
        ];

        return view('admin.repartidores.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function show(Repartidor $repartidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function edit(Repartidor $repartidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repartidor $repartidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repartidor $repartidor)
    {
        //
    }
}
