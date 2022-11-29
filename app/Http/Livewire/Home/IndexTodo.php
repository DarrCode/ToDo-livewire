<?php

namespace App\Http\Livewire\Home;

use App\Models\Todo;
use Livewire\Component;
use Carbon\Carbon;

class IndexTodo extends Component
{
    public $todos;

    public $todo;

    protected $listeners = [
        'todoAdded',
        'todoEdited',
        'todoReturned'
    ];

    public function mount()
    {
        $this->getTodos();
    }

    public function todoAdded()
    {
        $this->getTodos();
    }

    public function todoEdited()
    {
        $this->getTodos();
    }

    public function todoReturned()
    {
        $this->getTodos();
    }

    public function todoCompleted($id)
    {
        $this->getTodo($id);
        $this->todo->completed_at = now()->toDateTimeString();
        $this->todo->save();

        $this->mount();

        $this->emit('todoCompleted');
    }

    public function editTodo($id)
    {
        $editingTodo = Todo::where('editing', '=', true)
            ->first();

        if(!$editingTodo) {
            $this->getTodo($id);
            $this->todo->editing = true;
            $this->todo->save();

            $this->mount();

            $this->emit('editingTodo');
        }
    }

    public function deleteTodo($id)
    {
        $this->getTodo($id);
        $this->todo->delete();

        $this->mount();
    }

    public function getTodos()
    {
        $this->todos = Todo::where('completed_at', null)
            ->where('editing', '!=', true)
            ->get();
    }

    public function getTodo($id)
    {
        $this->todo = Todo::find($id);
    }

    public function render()
    {
        return view('livewire.home.index-todo');
    }
}
