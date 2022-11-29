<div>
    @if(! empty($todo))
        <div class="card todo-edit-card">
            <h2 class="text-center">Editar tarea</h2>

            <div class="card-body">
                @error('description') <span class="error">- {{ $message }}</span> @enderror
                    <form class="create-todo justify-content-center" wire:submit.prevent="submit">
                        <input wire:model="description" class="form-text rounded-lg shadow-sm p-4" required type="text">

                        <input wire:model="image" class="rounded-lg shadow-sm p-3 w-100 my-3" type="file">
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                        <div class="text-center">
                            <button class="btn btn-todo mx-2 fw-bold rounded-lg shadow-sm">ACTUALIZAR TAREA</button>
                        </div>
                </form>
            </div>
        </div>
    @endif
</div>
