<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Examen extends Component
{
    public $id_examen;
    public int $numero_pregunta = 1;
    public $tipo = 'falso';
    public $cancelar = 'falso';
    
    public function render()
    {                
        return view('livewire.examen', ['id' => $this->id_examen]);
    }

    public function exit(){
        redirect()->to('/CursosP');
    }
}
