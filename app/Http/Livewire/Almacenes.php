<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Almacenes as Almacen;

class Almacenes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $direccion, $municipio, $provincia, $telefono;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.almacenes.view', [
            'almacen' => Almacen::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('municipio', 'LIKE', $keyWord)
						->orWhere('provincia', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->direccion = null;
		$this->municipio = null;
		$this->provincia = null;
		$this->telefono = null;
	}

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		]);

        Almacen::create([
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion,
			'municipio' => $this-> municipio,
			'provincia' => $this-> provincia,
			'telefono' => $this-> telefono,
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Almcacen Creado Correctamente.');
    }

    public function edit($id)
    {
        $record = Almacen::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->direccion = $record-> direccion;
		$this->municipio = $record-> municipio;
		$this->provincia = $record-> provincia;
		$this->telefono = $record-> telefono;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		]);

        if ($this->selected_id) {
			$record = Almacen::find($this->selected_id);
            $record->update([
                'nombre' => $this-> nombre,
                'direccion' => $this-> direccion,
                'municipio' => $this-> municipio,
                'provincia' => $this-> provincia,
                'telefono' => $this-> telefono,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
			session()->flash('message', 'Almacen Editado Correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Almacen::where('id', $id);
            $record->delete();
            session()->flash('message_delete', 'Almacen Eliminado Correctamente.');
        }
    }
}
