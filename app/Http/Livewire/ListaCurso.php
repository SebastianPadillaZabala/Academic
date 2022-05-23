<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListaCurso extends Component
{
    public $cat;

   public function mount($cat){

     $this->cat = $cat;

   }

    public function render()
    {
        $cursos = new Curso();
        $cursos = DB::table('cursos')->where('id_categoria', '=', $this->cat)
        ->where('estado', '=', 'Aceptado')->get();   
        return view('livewire.lista-curso', [
            'cursos' => $cursos
        ]);
    }
}
