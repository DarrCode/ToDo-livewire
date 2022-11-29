<?php

namespace App\Http\Livewire\auth;

use Livewire\Component;
use Hash;
use App\Models\User;

class LoginRegister extends Component
{
    public $email, $password;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.auth.login-register');
    }

    private function resetInputFields(){
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            return redirect()->route('home');
        }else{
            session()->flash('error', 'Datos invalidos, intente nuevamente.');
        }
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        try {
        
            $this->password = Hash::make($this->password); 

            User::create(['email' => $this->email,'password' => $this->password]);
            $this->resetInputFields();
        } catch (\Throwable $th) {
            //throw $th;
        }
        session()->flash('message', 'Registro exitoso, inicia sesion ahora!');
    }
}