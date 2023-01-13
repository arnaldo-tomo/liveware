<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;

class Conta extends Component
{
    public $nome;
    public $idade;
    public $updateMode = false;
    public function render()
    {
        $pessoa = ModelsConta::all();
        return view('livewire.conta',compact('pessoa'))->layout('app');
    }

    public function limpar(){

    }
    public function save(){

        $this->validate([
            'nome' => 'required|string',
            'idade' => 'required|numeric',
        ]);

        $student = new ModelsConta();
        $student->nome = $this->nome;
        $student->idade = $this->idade;

        $student->save();
        session()->flash('message', 'New student has been added successfully');

        $this->emit('userStore');

        $this->nome ='';
        $this->idade ='';
        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id){
      $DELETE = ModelsConta::find($id);
      $DELETE->delete();
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $user = ModelsConta::where('id',$id)->first();
        $this->nome = $user->nome;
        $this->idade = $user->idade;

    }


}
