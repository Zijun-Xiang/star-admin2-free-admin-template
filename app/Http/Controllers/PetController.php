<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('PetID', 'desc')->paginate(10);

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Age' => 'nullable|integer',
            'Street' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'ZipCode' => 'nullable|string|max:10',
            'State' => 'nullable|string|max:50',
            'TypeofPet' => 'nullable|string|max:255',
        ]);

        Pet::create($validated);

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Age' => 'nullable|integer',
            'Street' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'ZipCode' => 'nullable|string|max:10',
            'State' => 'nullable|string|max:50',
            'TypeofPet' => 'nullable|string|max:255',
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
