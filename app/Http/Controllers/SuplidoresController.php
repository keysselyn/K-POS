<?php

namespace App\Http\Controllers;

use App\Models\Suplidores;
use Illuminate\Http\Request;

class SuplidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        return view("suplidores.suplidores_index", ["suplidores" => Suplidores::where('nombre', 'like', '%'.$buscar.'%')->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("suplidores.suplidores_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new Suplidores($request->input()))->saveOrFail();
        return redirect()->route("suplidores.index")->with("mensaje", "suplidor agregado");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Suplidores $suplidore
     * @return \Illuminate\Http\Response
     */
    public function show(Suplidores $suplidore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Suplidores $suplidore
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplidores $suplidore)
    {
        return view("suplidores.suplidores_edit", ["suplidore" => $suplidore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Suplidores $suplidore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplidores $suplidore)
    {
        $suplidore->fill($request->input());
        $suplidore->saveOrFail();
        return redirect()->route("suplidores.index")->with("mensaje", "Suplidor actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Suplidores $suplidore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplidores $suplidore)
    {
        $suplidore->delete();
        return redirect()->route("suplidores.index")->with("mensaje", "Suplidor eliminado");
    }
}
