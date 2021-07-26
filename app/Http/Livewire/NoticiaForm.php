<?php

namespace App\Http\Livewire;

use Livewire\Component;
//use App\Noticia;
use App\Models\Noticia;

class NoticiaForm extends Component
{

    public $titulo;
    public $descripcion;
    public $estado;


    public function submit()
    {
        $validatedData = $this->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required|min:10',
            'estado' => 'required',
        ]);
  
        Contact::create($validatedData);
  
        //return redirect()->to('/form');
    }

    public function render()
    {

        $noticias = Noticia::all();

        return view('livewire.noticia-form', compact('noticias'));
    }
}
