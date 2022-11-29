<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class CreateTodo extends Component
{
    use WithFileUploads;

    public $description;
    public $image;

    protected $rules = [
        'description' => 'required|max:100|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048'
    ];

    public function submit(Request $request)
    {
        $this->validate();

        $this->createTodo($request);

        $this->description = '';
        $this->image = [];

        $this->emit('todoAdded');
    }

    public function createTodo($request)
    {
        $image = $this->image->store('public/todos');

        Todo::create([
            'user_id' => $request->user()->id,
            'description' => $this->description,
            'image' => $image
        ]);
    }

    public function render()
    {
        return view('livewire.home.create-todo')
            ->layout('layouts.base');
    }
}
