<div class="row justify-content-center">
    <div class="col-12 col-md-5 mt-4">
        <img src="/icons/todo.png" width="250" alt="" srcset="">
    </div>
    <div class="col-12 col-md-7">
        <h1 class="text-center my-3"> ToDo APP </h1>
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if($registerForm)
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Correo electronico" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-group">
                            <input type="password" placeholder="Contrasena" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="password" placeholder="Confirmar contrasena" required class="form-control">
                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center my-3">
                        <button class="btn btn-primary rounded-pill fw-bold btn-auth" wire:click.prevent="registerStore">REGISTRAR CUENTA</button>
                    </div>
                    <div class="col-md-12 text-black text-center">
                        Ya tienes una cuenta? <a class="text-primary" style="cursor: pointer" wire:click.prevent="register"><strong>inicia sesion</strong></a>
                    </div>
                </div>
            </form>
        @else
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Correo electronico" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <input type="password" placeholder="Contrasena" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary rounded-pill fw-bold btn-auth" wire:click.prevent="login">INICIA SESION</button>
                    </div>
                    <div class="col-md-12 my-4 text-black text-center">
                        No tienes una cuenta? <a class="text-primary" style="cursor: pointer" wire:click.prevent="register"><strong>Registrate aqui</strong></a>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>