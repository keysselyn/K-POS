<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class Demo extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function menos()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.demo');
    }
}
