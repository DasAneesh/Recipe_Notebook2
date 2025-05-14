@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $recipe->name }}</h1>
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning">Edit</a>
        </div>
        <div class="card-body">
            <h3>Ingredients</h3>
            <p>{{ $recipe->ingredients }}</p>
            
            <h3>Steps</h3>
            <p>{{ $recipe->steps }}</p>
        </div>
        <div class="card-footer">
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to All Recipes</a>
        </div>
    </div>
@endsection