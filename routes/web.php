<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home\CreateTodo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
  return view('livewire.auth.auth');
})->name('auth');

Route::view('login', 'livewire.auth.auth');

Route::middleware('auth')->group(function() {

  //Route::get('/home', [App\Http\Livewire\Home\IndexTodo::class, 'render'])->name('home');
  Route::get('/home', CreateTodo::class);


});
