<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ingredients' => 'required',
            'steps' => 'required'
        ]);

        Recipe::create($validated);
        
        return redirect()->route('recipes.index')
                         ->with('success', 'Recipe created successfully!');
    }
    
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing a recipe
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified recipe
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ingredients' => 'required',
            'steps' => 'required'
        ]);

        $recipe->update($validated);
        
        return redirect()->route('recipes.show', $recipe)
                         ->with('success', 'Recipe updated successfully!');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')
                         ->with('success', 'Recipe deleted successfully!');
    }
}