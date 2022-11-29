<div>
    {{-- Be like water. --}}
</div>
<div class="card todos-card">
    <div class="card-body justify-content-center">
        <h2>Tareas completadas</h2>

        <p class="card-separator"></p>
        
        <ul class="todo-list">
            @foreach($todos as $key => $todo)
                <div x-data="{ open: false }">
                    <li @click="open = true" class="todo shadow-sm">
                        <span class="todo-completed-icon"><i class="fas fa-check"></i></span> {{ $todo->description }}
                        <img src="{{ Storage::url($todo->image) }}" width="100" alt="">
                        <span class="todo-completed-date">({{$todo->completed_at}})</span>

                    </li>

                    <ul x-show.transition.in.duration.150ms="open" @click.away="open = false" x-cloak>
                        <li wire:click="returnTodo({{$todo->id}})" @click="open = false" class="todo-buttons"><i class="fas fa-undo-alt"></i></li>
                        <li wire:click="deleteTodo({{$todo->id}})" @click="open = false" class="todo-buttons"><i class="fas fa-trash-alt"></i></li>
                    </ul>
                </div>
            @endforeach
        </ul>
    </div>
</div>

<style>
    [x-cloak] { display: none; }
</style>
