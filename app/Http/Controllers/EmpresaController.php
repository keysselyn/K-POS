<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;
class EmpresaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('Empresa.index')->with('empresas',$empresas);
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
        $empresas = new Empresa();

        $empresas->razon_social = $request->get('razon_social');
        $empresas->rnc_cedula = $request->get('rnc_cedula');
        $empresas->telefono = $request->get('telefono');
        $empresas->provincia = $request->get('provincia');
        $empresas->municipio = $request->get('municipio');
        $empresas->direccion = $request->get('direccion');
        // guarda la imagen
        $request->validate([
            'archivo' => 'required|image|max:2048'
        ]);
        $imagenes = $request->file('archivo')->store('public');
        $url = Storage::url($imagenes);

        $empresas->imagen = ($url);
        // guarda la imagen

        $empresas->save();

        return redirect('/empresa');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresa.edit')->with('empresa', $empresa);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        $empresa->razon_social = $request->get('razon_social');
        $empresa->rnc_cedula = $request->get('rnc_cedula');
        $empresa->telefono = $request->get('telefono');
        $empresa->provincia = $request->get('provincia');
        $empresa->municipio = $request->get('municipio');
        $empresa->direccion = $request->get('direccion');
        // guarda la imagen
        $request->validate([
            'archivo' => 'image|max:2048'
        ]);
        if($request->file('archivo')){
        $imagenes = $request->file('archivo')->store('public');
        $url = Storage::url($imagenes);

        $empresa->imagen = ($url);
        }
        // guarda la imagen

        $empresa->save();

        return redirect('/empresa');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
