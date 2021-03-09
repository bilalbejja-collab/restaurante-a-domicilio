<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plato;
use App\Models\Categoria;
use App\Models\Restaurante;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PlatoController extends Controller
{
    /**
     * Protección de rutas
     */
    public function __construct()
    {
        $this->middleware('can:admin.platos.index')->only('index');
        $this->middleware('can:admin.platos.create')->only('create', 'store');
        $this->middleware('can:admin.platos.edit')->only('edit', 'update');
        $this->middleware('can:admin.platos.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();

        return view('admin.platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pluck : genera un array solamente con los valores (sin claves) con el campo que quieras en este caso 'id'
        $categorias = Categoria::pluck('nombre', 'id');

        $restaurantes = Restaurante::pluck('nombre', 'id');

        return view('admin.platos.create', compact('categorias', 'restaurantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:platos',
            'descripcion' => 'required',
            'file' => 'image',
            'precio' => 'required',
            'categoria_id' => 'required',
            'restaurante_id' => 'required'
        ]);

        $plato = Plato::create($request->all());

        // mover la imágen a la carpeta public/storage/platos
        if ($request->file('file')) {
            $url = Storage::put('platos', $request->file('file'));
            // asignar la foto a este plato
            $plato->foto()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.platos.edit', $plato)->with('info', 'El plato se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        $categorias = Categoria::pluck('nombre', 'id');

        $restaurantes = Restaurante::pluck('nombre', 'id');

        return view('admin.platos.edit', compact('plato', 'categorias', 'restaurantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        //ignorar el plato actual
        $request->validate([
            'nombre' => "required|unique:platos,nombre,$plato->id",
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria_id' => 'required',
            'restaurante_id' => 'required'
        ]);

        $plato->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('platos', $request->file('file'));

            if ($plato->foto) {
                Storage::delete($plato->foto->url);

                $plato->foto->update([
                    'url' => $url
                ]);
            } else {
                $plato->foto()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect(route('admin.platos.edit', $plato))->with('info', 'El plato se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        // se puede borrar la foto de esta forma abajo o con el observer que esta en app/Observers/PlatoObserver
        //Storage::delete($plato->foto->url);
        $plato->delete();

        return redirect(route('admin.platos.index'))->with('info', 'El plato se eliminó con éxito');
    }

    # API REST

    /**
     * Crea un plato
     */
    public function apiStorePlato(Request $request)
    {
        $plato = new Plato();
        $plato->nombre = $request->nombre;
        $plato->descripcion = $request->descripcion;
        $plato->precio = $request->precio;
        $plato->categoria_id = $request->categoria_id;
        $plato->restaurante_id = $request->restaurante_id;

        return $plato->save() ? response([
            'message' => 'Plato creado correctamente'
        ], 201) : 'No se creó el plato';
    }

    /**
     * Borra un plato
     */
    public function apiDeletePlato(Request $request)
    {
        $plato = Plato::where('id', $request->plato_id)
            ->where('restaurante_id', $request->restaurante_id);

        return $plato->delete() ?
            response(['message' => 'Plato borrado correctamente'], 201) :
            'No se borró el plato';
    }
}
