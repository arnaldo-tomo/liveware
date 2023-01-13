<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;

class Conta extends Component
{
    public $nome,$user_id;
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
            'nome' => 'required|string',
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
        $user = ModelsConta::find($this->user_id);
        if($this->user_id){
            $user->update([
                $this->nome = $user->nome,
                $this->idade = $user->idade,
            ]);
            $user->update();
            $this->updateMode = false;
          session()->flash('message', 'actualizado successfully');
        }

    }


}
