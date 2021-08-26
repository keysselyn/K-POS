<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familia;
use Illuminate\Support\Facades\Storage;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        return view('productos.productos_familia',
        ["familias" => Familia::where('descripcion', 'like', '%'.$buscar.'%')->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familia = new Familia($request->input());
        // guarda la imagen
        if($request->file('archivo')){

            $request->validate([
                'archivo' => 'required|image|max:2048'
            ]);
            $imagenes = $request->file('archivo')->store('public');
            $url = Storage::url($imagenes);

            $familia->imagen = ($url);

            }

        // guarda la imagen
        $familia->saveOrFail();
        return redirect()->route("familias.index")->with("mensaje", "Famila guardada");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Familia $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
         return view("productos.productos_familia_edit", ["familia" => $familia,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Familia $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        $familia->fill($request->input());
        // guarda la imagen
        if($request->file('archivo')){

            $request->validate([
                'archivo' => 'required|image|max:2048'
            ]);
            $imagenes = $request->file('archivo')->store('public');
            $url = Storage::url($imagenes);

            $familia->imagen = ($url);

            }

        // guarda la imagen
        $familia->saveOrFail();
        return redirect()->route("familias.index")->with("mensaje", "Famila guardada");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Familia $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();
        return redirect()->route("familias.index")->with("mensaje", "Familia eliminada");
    }
}
