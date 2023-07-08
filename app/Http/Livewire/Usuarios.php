<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Usuarios extends Component
{
    var $contador=0;

    public function sumar(){
        $this->contador+=1;
    }

    public function render()
    {
        return view('livewire.usuarios');
    }
}
