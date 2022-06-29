<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Examen extends Component
{
    public int $numero_pregunta = 1;
    public $tipo = 'falso';
    public $cancelar = 'falso';    
    public function render()
    {        
        return view('livewire.examen');
    }
}
