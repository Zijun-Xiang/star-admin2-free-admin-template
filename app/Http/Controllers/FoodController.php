<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('FoodID', 'desc')->paginate(10);

        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        return view('foods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Brand' => 'nullable|string|max:255',
            'TypeofFood' => 'nullable|string|max:255',
            'Price' => 'nullable|numeric',
            'ItemWeight' => 'nullable|numeric',
            'ClassofFood' => 'nullable|string|max:255',
        ]);

        Food::create($validated);

        return redirect()->route('foods.index')->with('success', 'Food created successfully.');
    }

    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        return view('foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Brand' => 'nullable|string|max:255',
            'TypeofFood' => 'nullable|string|max:255',
            'Price' => 'nullable|numeric',
            'ItemWeight' => 'nullable|numeric',
            'ClassofFood' => 'nullable|string|max:255',
        ]);

        $food->update($validated);

        return redirect()->route('foods.index')->with('success', 'Food updated successfully.');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Food deleted successfully.');
    }
}
