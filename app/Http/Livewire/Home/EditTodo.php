<?php

namespace App\Http\Livewire\Home;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTodo extends Component
{
    use WithFileUploads;

    public $todo;
    public $description;
    public $image;

    protected $rules = [
        'description' => 'required|max:100|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048'
    ];

    protected $listeners = [
        'editingTodo'
    ];

    public function mount()
    {
        $this->getTodo();
    }

    public function submit()
    {
        $this->validate();

        $this->updateTodo();

        $this->todo = null;

        $this->emit('todoEdited');
    }

    public function editingTodo()
    {
        $this->getTodo();
    }

    public function updateTodo()
    {
        $this->todo->description = $this->description;
        $this->todo->image = $this->image;
        $this->todo->editing = false;

        $this->todo->save();
    }

    public function getTodo()
    {
        $this->todo = Todo::where('editing', '=', true)
            ->first();

        if($this->todo) {
            $this->description = $this->todo->description;
            $this->image = $this->todo->image;
        }
    }

    public function render()
    {
        return view('livewire.home.edit-todo');
    }
}
