<?php

namespace App\Http\Controllers;

use App\Models\Own;
use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class OwnController extends Controller
{
    public function index()
    {
        $owns = Own::with(['pet', 'owner'])->orderByDesc('Year')->paginate(10);

        return view('owns.index', compact('owns'));
    }

    public function create()
    {
        $pets = Pet::orderBy('Name')->get();
        $owners = Owner::orderBy('LastName')->get();

        return view('owns.create', compact('pets', 'owners'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PetID' => 'required|exists:pets,PetID',
            'Year' => 'required|integer',
            'OID' => 'required|exists:owners,OID',
            'PetAgeatOwnership' => 'nullable|integer',
            'PricePaid' => 'nullable|numeric',
        ]);

        Own::create($validated);

        return redirect()->route('owns.index')->with('success', 'Ownership record created successfully.');
    }

    public function show(Own $own)
    {
        $own->load(['pet', 'owner']);

        return view('owns.show', compact('own'));
    }

    public function edit(Own $own)
    {
        $pets = Pet::orderBy('Name')->get();
        $owners = Owner::orderBy('LastName')->get();

        return view('owns.edit', compact('own', 'pets', 'owners'));
    }

    public function update(Request $request, Own $own)
    {
        $validated = $request->validate([
            'PetID' => 'required|exists:pets,PetID',
            'Year' => 'required|integer',
            'OID' => 'required|exists:owners,OID',
            'PetAgeatOwnership' => 'nullable|integer',
            'PricePaid' => 'nullable|numeric',
        ]);

        $own->update($validated);

        return redirect()->route('owns.index')->with('success', 'Ownership record updated successfully.');
    }

    public function destroy(Own $own)
    {
        $own->delete();

        return redirect()->route('owns.index')->with('success', 'Ownership record deleted successfully.');
    }
}
