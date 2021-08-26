<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;
use Livewire\WithFileUploads;

class Familias extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $imagen1, $imagen2, $imagen;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.Familias.view', [
            'familia' => Familia::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->descripcion = null;
		$this->imagen = null;
        $this->imagen1 = null;
        $this->imagen2 = null;

	}

    public function store()
    {

        if ($this->imagen1 === NULL){
            $this->validate([
                'descripcion' => 'required',
                ]);
            Familia::create([
                'descripcion' => $this-> descripcion,

            ]);

        }
        else{
            $this->validate([
                'descripcion' => 'required',
                'imagen1' => 'image|max:2048', // 2MB Max
                ]);
            Familia::create([
                'descripcion' => $this-> descripcion,
                'imagen' => $this->imagen1->store('public'),


            ]);

        }


        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Familia Creada Correctamente.');
    }

    public function edit($id)
    {
        $record = Familia::findOrFail($id);

        $this->selected_id = $id;
		$this->descripcion = $record-> descripcion;
		$this->imagen2 = $record-> imagen;
        $this->imagen = $record-> imagen;
		$this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		]);

        if ($this->selected_id) {
			$record = Familia::find($this->selected_id);
            $img_old = $record->imagen;
            if ($img_old !== $this-> imagen){
                $record->update([
                    'descripcion' => $this-> descripcion,
                    'imagen' => $this-> imagen->store('public'),

                ]);

            }
            else {
                $record->update([
                    'descripcion' => $this-> descripcion,

                ]);

            }


            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
			session()->flash('message_edit', 'Familia Editada Correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Familia::where('id', $id);
            $record->delete();
            session()->flash('message_delete', 'Familia Eliminada Correctamente.');
        }
    }
}
