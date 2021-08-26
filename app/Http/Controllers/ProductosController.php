<?php
/*


██╗░░██╗███╗░░░███╗██████╗░██████╗░
██║░██╔╝████╗░████║██╔══██╗██╔══██╗
█████═╝░██╔████╔██║██████╔╝██████╦╝
██╔═██╗░██║╚██╔╝██║██╔══██╗██╔══██╗
██║░╚██╗██║░╚═╝░██║██║░░██║██████╦╝
╚═╝░░╚═╝╚═╝░░░░░╚═╝╚═╝░░╚═╝╚═════╝░

    Contacto:   https://parzibyte.me/blog/contacto/

    Copyright (c) 2021 Keysselyn Rodriguez
    Licenciado bajo la licencia MIT

    El texto de arriba debe ser incluido en cualquier redistribucion
*/ ?>
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Familia;
use App\Models\Impuesto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;
use App\Imports\ProductosImport;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $buscar = $request->get('buscar');

        return view("productos.productos_index",
        ["productos" => Producto::where('descripcion', 'like', '%'.$buscar.'%')->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia = Familia::all();
        $impuesto = Impuesto::all();
        return view("productos.productos_create", ["familia" => $familia, "impuesto" => $impuesto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto($request->input());
        // guarda la imagen
        if($request->file('archivo')){

            $request->validate([
                'archivo' => 'required|image|max:2048'
            ]);
            $imagenes = $request->file('archivo')->store('public');
            $url = Storage::url($imagenes);

            $producto->imagen = ($url);

            }

        // guarda la imagen
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *@param \App\Familia $familia
     *@param \App\Impuesto $impuesto
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto, Familia $familia, Impuesto $impuesto)
    {
        $familia = Familia::all();
        $impuesto = Impuesto::all();
        return view("productos.productos_edit", ["producto" => $producto, "familia" => $familia, "impuesto" => $impuesto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->input());
        if($request->file('archivo')){

            $request->validate([
                'archivo' => 'required|image|max:2048'
            ]);
            $imagenes = $request->file('archivo')->store('public');
            $url = Storage::url($imagenes);

            $producto->imagen = ($url);

            }

        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route("productos.index")->with("eliminar", "ok");
    }

    public function ExportExcel()
    {
        return Excel::download(new ProductosExport, 'Poductos.xlsx');
    }

    public function ImportExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ProductosImport, $file);
        return back()->with('messege', 'importacion completada');
    }

    //Pruevas Ajax

    public function productosajax(Request $request)
    {
        $producto = Producto::all();
        return response(json_encode($producto),200)->header('Content-type', 'text/plain');
    }


}
