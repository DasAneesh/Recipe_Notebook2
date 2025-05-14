@extends('layouts.app')

@section('content')
    <h1 class="mb-4">My Recipes</h1>
    <a href="{{ route('recipes.create') }}" class="btn btn-primary mb-3">Add New Recipe</a>
    
    @forelse ($recipes as $recipe)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->name }}</h5>
                <p class="card-text"><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
                <p class="card-text"><strong>Steps:</strong> {{ $recipe->steps }}</p>
                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No recipes found. Add your first recipe!</p>
    @endforelse
@endsection