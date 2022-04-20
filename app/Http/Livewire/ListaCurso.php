<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use Livewire\Component;

class ListaCurso extends Component
{
    public function render()
    {
        return view('livewire.lista-curso', [
            'cursos' => Curso::all()
        ]);
    }
}
