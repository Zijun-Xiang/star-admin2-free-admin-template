<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['owner', 'food', 'pet'])
            ->orderByDesc('Year')
            ->orderByDesc('Month')
            ->paginate(10);

        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $owners = Owner::orderBy('LastName')->get();
        $foods = Food::orderBy('Name')->get();
        $pets = Pet::orderBy('Name')->get();

        return view('purchases.create', compact('owners', 'foods', 'pets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'OID' => 'required|exists:owners,OID',
            'FoodID' => 'required|exists:foods,FoodID',
            'PetID' => 'required|exists:pets,PetID',
            'Month' => 'required|integer|min:1|max:12',
            'Year' => 'required|integer',
            'Quantity' => 'required|integer|min:1',
        ]);

        Purchase::create($validated);

        return redirect()->route('purchases.index')->with('success', 'Purchase recorded successfully.');
    }

    public function show(Purchase $purchase)
    {
        $purchase->load(['owner', 'food', 'pet']);

        return view('purchases.show', compact('purchase'));
    }

    public function edit(Purchase $purchase)
    {
        $owners = Owner::orderBy('LastName')->get();
        $foods = Food::orderBy('Name')->get();
        $pets = Pet::orderBy('Name')->get();

        return view('purchases.edit', compact('purchase', 'owners', 'foods', 'pets'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'OID' => 'required|exists:owners,OID',
            'FoodID' => 'required|exists:foods,FoodID',
            'PetID' => 'required|exists:pets,PetID',
            'Month' => 'required|integer|min:1|max:12',
            'Year' => 'required|integer',
            'Quantity' => 'required|integer|min:1',
        ]);

        $purchase->update($validated);

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }
}
