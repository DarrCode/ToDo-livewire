
<div class="card todos-card">
    <div class="card-body justify-content-center">
        <h2>Tareas por hacer</h2>
        <p class="card-separator"></p>
        <ul class="todo-list">
            @foreach($todos as $key => $todo)
                <div x-data="{ open: false }">
                    <li @click="open = true" class="todo shadow-sm">
                        <span class="todo-number fw-bold">{{++$key}}</span> - {{ $todo->description }}
                        <img src="{{ Storage::url($todo->image) }}" width="100" alt="">
                        <ul class="float-end">
                            <li wire:click="todoCompleted({{$todo->id}})" @click="open = false" class="todo-buttons shadow-sm"><i class="fas fa-check"></i></li>
                            <li wire:click="editTodo({{$todo->id}})" @click="open = false" class="todo-buttons btn-update shadow-sm"><i class="fas fa-edit"></i></li>
                            <li wire:click="deleteTodo({{$todo->id}})" @click="open = false" class="todo-buttons btn-delete shadow-sm"><i class="fas fa-trash-alt"></i></li>
                        </ul>
                    </li>
                </div>
            @endforeach
        </ul>
    </div>
</div>

