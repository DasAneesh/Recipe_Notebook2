@extends('layouts.app')

@section('content')
    <h1>Edit Recipe: {{ $recipe->name }}</h1>
    
    <form action="{{ route('recipes.update', $recipe) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $recipe->name) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" 
                      rows="3" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="steps" class="form-label">Steps</label>
            <textarea class="form-control" id="steps" name="steps" 
                      rows="5" required>{{ old('steps', $recipe->steps) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Recipe</button>
        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection