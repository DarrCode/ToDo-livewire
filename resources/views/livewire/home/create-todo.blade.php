<div class="card todo-card">
    <div class="card-body">
        <h1>Crear tarea</h1>

        <form class="create-todo" wire:submit.prevent="submit">
            <input wire:model="description" class="form-text rounded-lg shadow-sm p-4" type="text" placeholder="Escribe tu tarea...">
            @error('description')<span class="text-danger fw-bold">{{ $message }}</span>@enderror
            
            <input wire:model="image" class="rounded-lg shadow-sm p-3 w-100 my-3" type="file">
            @error('image') <span class="text-danger fw-bold">{{ $message }}</span> @enderror

            <div class="text-center">
                <button class="btn btn-todo p-2 mx-2 fw-bold rounded-lg shadow-sm">CREAR TAREA</button>
            </div>
        </form>
    </div>
</div>
