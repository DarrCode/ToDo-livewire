@extends('layouts.app')

@section('content')

<main class="container-todo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                {{ $slot }}         

                @livewire('home.edit-todo')
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                @livewire('home.index-todo')
            </div>
            <div class="col-12 col-md-6">
                @livewire('home.completed-todo')
            </div>
        </div>
    </div>
</main>

@endsection
