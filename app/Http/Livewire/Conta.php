<?php

namespace App\Http\Livewire;

use App\Models\conta as ModelsConta;
use Livewire\Component;
use Livewire\WithPagination;

class Conta extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selected_id;
    public $nome;
    public $idade;
    public $updateMode = false;
    public function render()
    {
        $pessoa = ModelsConta::paginate(5);
        return view('livewire.conta', compact('pessoa'))->layout('app');
    }

    public function closeModal()
    {
        $this->limpar();
        $this->nome = '';
        $this->idade = '';
    }
    public function limpar()
    {
        $this->nome = '';
        $this->idade = '';
    }

    public function save()
    {

        $this->validate([
            'nome' => 'required|string',
            'idade' => 'required|numeric',
        ]);
        $student = new ModelsConta();
        $student->nome = $this->nome;
        $student->idade = $this->idade;
        $student->save();

        $this->updateMode = false;
        session()->flash('message', 'saved');
        // $this->dispatchBrowserEvent('modalClose');
        $this->emit('modalClose', '#exampleModalToggle');
        $this->limpar();
        $this->nome = '';
        $this->idade = '';
    }

    public function delete($id)
    {
        $DELETE = ModelsConta::find($id);
        $DELETE->delete();
        $this->limpar();
        session()->flash('message', 'deleted');
        $this->emit('modalClose', '#modalId');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $user = ModelsConta::where('id', $id)->first();
        $this->selected_id = $id;
        $this->nome = $user->nome;
        $this->idade = $user->idade;
        // $this->limpar();

    }


    public function update()
    {
        $this->updateMode = false;
        $student =  ModelsConta::find($this->selected_id);
        $student->nome = $this->nome;
        $student->idade = $this->idade;
        $student->update();
        session()->flash('message', 'update');
        $this->emit('modalClose', '#modalId');

        // $this->limpar();


    }
}
