<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;

class Conta extends Component
{
    public $nome;
    public $idade;
    public function render()
    {
        $pessoa = ModelsConta::all();
        return view('livewire.conta',compact('pessoa'))->layout('app');
    }

    public function save(){

        $student = new ModelsConta();
        $student->nome = $this->nome;
        $student->idade = $this->idade;

        $student->save();
        session()->flash('message', 'New student has been added successfully');

        $this->nome ='';
        $this->idade ='';

    }
}