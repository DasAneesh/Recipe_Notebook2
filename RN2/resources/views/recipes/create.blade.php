@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add New Recipe</h1>
    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="steps" class="form-label">Steps</label>
            <textarea class="form-control" id="steps" name="steps" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Recipe</button>
    </form>
@endsection