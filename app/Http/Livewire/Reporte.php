<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Clase;
use App\Models\Curso;
use App\Models\Plan;
use App\Models\Profesor;
use App\Models\User;
use Livewire\Component;

class Reporte extends Component
{
    //UI
    public $modelos = [];
    public $atributosM = [];
    public $tipo = 'defecto';

    //Controller
    public $datos = [];
    public $atributos = [];
    public $extension;
    public $contenido;

    public function mount()
    {
        $this->modelos = [
            [
                "id" => 'users',
                "Modelo" =>  "Usuario"
            ],
            [
                "id" => 'alumnos',
                "Modelo" =>  "Alumno"
            ],
            [
                "id" => 'clases',
                "Modelo" =>  "Clase"
            ],
            [
                "id" => 'cursos',
                "Modelo" =>  "Curso"
            ],
            [
                "id" => 'planes',
                "Modelo" =>  "Planes"
            ],
            [
                "id" => 'profesores',
                "Modelo" =>  "Profesor"
            ],
            [
                "id" => 'Categorias',
                "Modelo" =>  "Categoria"
            ],
        ];
        $this->datos = [
            'nombre' => '',
            'modelo' => '',
        ];
    }

    public function limpiar()
    {
        $this->datos = [
            'nombre' => '',
            'modelo' => '',
        ];
        $this->atributos = [];
    }

    public function render()
    {
        switch ($this->datos['modelo']) {
            case 'users':
                $this->atributosM = User::$atributos;
                break;
            case 'alumnos':
                $this->atributosM = Alumno::$atributos;
                break;
            case 'profesores':
                $this->atributosM = Profesor::$atributos;
                break;
            case 'planes':
                $this->atributosM = Plan::$atributos;
                break;
            case 'categoria':
                $this->atributosM = Categoria::$atributos;
                break;
            case 'clases':
                $this->atributosM = Clase::$atributos;
                break;
            case 'cursos':
                $this->atributosM = Curso::$atributos;
                break;
            default:
                $this->atributosM = [];
                break;
        }
        return view('livewire.reporte');
    }
}
