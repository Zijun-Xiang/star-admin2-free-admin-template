<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::orderBy('OID', 'desc')->paginate(10);

        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'LastName' => 'required|string|max:255',
            'Street' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'ZipCode' => 'nullable|string|max:10',
            'State' => 'nullable|string|max:50',
            'Age' => 'nullable|integer',
            'AnnualIncome' => 'nullable|numeric',
        ]);

        Owner::create($validated);

        return redirect()->route('owners.index')->with('success', 'Owner created successfully.');
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $validated = $request->validate([
            'LastName' => 'required|string|max:255',
            'Street' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'ZipCode' => 'nullable|string|max:10',
            'State' => 'nullable|string|max:50',
            'Age' => 'nullable|integer',
            'AnnualIncome' => 'nullable|numeric',
        ]);

        $owner->update($validated);

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully.');
    }
}
