<?php

namespace App\Http\Livewire\Home;

use App\Models\Todo;
use Carbon\Carbon;
use Livewire\Component;

class CompletedTodo extends Component
{
    public $todos;

    protected $listeners = [
        'todoAdded',
        'todoCompleted'
    ];

    public function mount()
    {
        $this->getTodos();
    }

    public function todoAdded()
    {
        $this->getTodos();
    }

    public function todoCompleted()
    {
        $this->getTodos();
    }

    public function getTodos()
    {
        $todos = Todo::where('completed_at', '!=', null)
            ->orderBy('completed_at', 'desc')
            ->get();

        foreach ($todos as $key => $todo) {
            $date = Carbon::parse($todo->completed_at);
            $todo->completed_at = $date->format('m/d/Y g:i A');
        }

        $this->todos = $todos;
    }

    public function getTodo($id)
    {
        $this->todo = Todo::find($id);
    }

    public function returnTodo($id)
    {
        $this->getTodo($id);
        $this->todo->completed_at = null;
        $this->todo->save();

        $this->mount();

        $this->emit('todoReturned');
    }

    public function deleteTodo($id)
    {
        $this->getTodo($id);
        $this->todo->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.home.completed-todo');
    }
}
