<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Familia;
use App\Models\Impuesto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;
use App\Imports\ProductosImport;
use Livewire\WithFileUploads;


class Productos extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo_barras, $descripcion, $familia, $precio_compra, $precio_venta, $itbis, $existencia, $existencia_minima, $imagen1, $imagen2, $imagen;

    public $updateMode = false;

    public function render()
    {
        $familia = Familia::all()->toArray();
        $impuesto = Impuesto::all()->toArray();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.Productos.view', [
            'producto' => Producto::latest()
						->orWhere('codigo_barras', 'LIKE', $keyWord)
                        ->orWhere('descripcion', 'LIKE', $keyWord)
                        ->paginate(100),
            'familias' => Familia::all(),
            'impuestos' => Impuesto::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->codigo_barras = null;
		$this->descripcion = null;
        $this->familia = null;
        $this->precio_compra = null;
        $this->precio_venta = null;
        $this->itbis = null;
        $this->existencia = null;
        $this->existencia_minima = null;
		$this->imagen = null;
        $this->imagen1 = null;
        $this->imagen2 = null;

	}

    public function store()
    {

        if ($this->imagen1 === NULL){
            $this->validate([
                'codigo_barras'=> 'required|unique:Productos,codigo_barras',
                'descripcion' => 'required',
                'familia' => 'required',
                'itbis' => 'required',
                ]);
                Producto::create([
                'codigo_barras' => $this-> codigo_barras,
                'descripcion' => $this-> descripcion,
                'familia' => $this-> familia,
                'precio_compra' => $this-> precio_compra,
                'precio_venta' => $this-> precio_venta,
                'itbis' => $this-> itbis,
                'existencia' => $this-> existencia,
                'existencia_minima' => $this-> existencia_minima,

            ]);

        }
        else{
            $this->validate([
                'codigo_barras' => 'required|unique:Productos,codigo_barras',
                'descripcion' => 'required',
                'familia' => 'required',
                'itbis' => 'required',
                'imagen1' => 'image|max:2048', // 2MB Max
                ]);
                Producto::create([
                'codigo_barras' => $this-> codigo_barras,
                'descripcion' => $this-> descripcion,
                'familia' => $this-> familia,
                'precio_compra' => $this-> precio_compra,
                'precio_venta' => $this-> precio_venta,
                'itbis' => $this-> itbis,
                'existencia' => $this-> existencia,
                'existencia_minima' => $this-> existencia_minima,
                'imagen' => $this->imagen1->store('public'),


            ]);

        }


        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Creado Correctamente.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id;
        $this-> codigo_barras = $record-> codigo_barras;
		$this->descripcion = $record-> descripcion;
        $this-> familia = $record-> familia;
        $this-> precio_compra = $record-> precio_compra;
        $this-> precio_venta = $record-> precio_venta;
        $this-> itbis = $record-> itbis;
        $this-> existencia = $record-> existencia;
        $this-> existencia_minima = $record-> existencia_minima;
		$this->imagen2 = $record-> imagen;
        $this->imagen = $record-> imagen;
		$this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        'codigo_barras' => 'required',
		'descripcion' => 'required',
        'familia' => 'required',
        'itbis' => 'required',
		]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $img_old = $record->imagen;
            if ($img_old !== $this-> imagen){
                $record->update([
                    'codigo_barras' => $this-> codigo_barras,
                    'descripcion' => $this-> descripcion,
                    'familia' => $this-> familia,
                    'precio_compra' => $this-> precio_compra,
                    'precio_venta' => $this-> precio_venta,
                    'itbis' => $this-> itbis,
                    'existencia' => $this-> existencia,
                    'existencia_minima' => $this-> existencia_minima,
                    'imagen' => $this-> imagen->store('public'),

                ]);

            }
            else {
                $record->update([
                    'codigo_barras' => $this-> codigo_barras,
                    'descripcion' => $this-> descripcion,
                    'familia' => $this-> familia,
                    'precio_compra' => $this-> precio_compra,
                    'precio_venta' => $this-> precio_venta,
                    'itbis' => $this-> itbis,
                    'existencia' => $this-> existencia,
                    'existencia_minima' => $this-> existencia_minima,

                ]);

            }


            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
			session()->flash('message_edit', 'Producto Editado Correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::where('id', $id);
            $record->delete();
            session()->flash('message_delete', 'Producto Eliminado Correctamente.');
        }
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
}
