<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;
use Livewire\WithPagination;

class Conta extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $selected_id;
    public $nome;
    public $idade;
    public $updateMode = false;
    public function render()
    {
        $pessoa = ModelsConta::paginate(2);
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
        $this->selected_id = $id;
        $this->nome = $user->nome;
        $this->idade = $user->idade;

    }


    public function update(){

        $student =  ModelsConta::find($this->selected_id);
        // dd($student);
        $student->nome = $this->nome;
        $student->idade = $this->idade;
        $student->update();


    }


}
