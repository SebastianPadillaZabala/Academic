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
        $cursos = DB::table('cursos')
        ->join('profesores', 'profesores.id_profe', '=', 'cursos.id_prof')
        ->join('users', 'users.id', '=', 'profesores.id_user')
        ->select('cursos.*', 'users.name')
        ->where('id_categoria', '=', $this->cat)
        ->where('estado', '=', 'Aceptado')->get();   
        return view('livewire.lista-curso', [
            'cursos' => $cursos
        ]);
    }
}
