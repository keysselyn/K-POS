<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impuesto;

class ImpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        return view('contabilidad.impuestos',
        ["impuestos" => Impuesto::where('descripcion', 'like', '%'.$buscar.'%')->paginate(50)]);
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
        $impuesto = new Impuesto($request->input());

        $impuesto->saveOrFail();
        return redirect()->route("impuestos.index")->with("mensaje", "Impuesto guardada");

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
     * @param \App\Impuesto $impuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Impuesto $impuesto)
    {
         return view("contabilidad.impuesto_edit", ["impuesto" => $impuesto,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Impuesto $impuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impuesto $impuesto)
    {
        $impuesto->fill($request->input());

        return redirect()->route("familias.index")->with("mensaje", "Impueto guardado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Impuesto $impuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impuesto $impuesto)
    {
        $impuesto->delete();
        return redirect()->route("impuesto.index")->with("mensaje", "Impuesto eliminado");
    }
}
