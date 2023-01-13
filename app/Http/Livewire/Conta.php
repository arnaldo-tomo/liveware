<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;

class Conta extends Component
{
    public $conta_id;
    public $nome;
    public $idade;
    public $updateMode = false;
    public function render()
    {
        $pessoa = ModelsConta::all();
        return view('livewire.conta',compact('pessoa'))->layout('app');
    }

    public function limpar(){
        $this->nome ='';
        $this->idade ='';

    }
    public function save(){

        $this->validate([
            'nome' => 'required|email',
            'idade' => 'required|numeric',
        ]);

        $student = new ModelsConta();
        $student->nome = $this->nome;
        $student->idade = $this->idade;
        $student->save();

        session()->flash('message', 'New student has been added successfully');
        $this->limpar();
        session('fechar','messade de registro');
        $this->emit('userStore');


        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id){
      $DELETE = ModelsConta::find($id);
      $DELETE->delete();
      session()->flash('message', 'New student has been added successfully');

    }
    public function edit($id)
    {
        $this->updateMode = true;
        $user = ModelsConta::where('id',$id)->first();
        $this->nome = $user->nome;
        $this->idade = $user->idade;

    }


    public function update(){

        dd($this->conta_id);
        $student =  ModelsConta::find($this->conta_id);
        // $student->nome = $this->nome;
        // $student->idade = $this->idade;
        $student->update();


    }


}
