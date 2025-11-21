@extends('layouts.app')

@section('title', 'Edit Pet')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Pet</h4>

                <form method="POST" action="{{ route('pets.update', $pet) }}" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name" value="{{ old('Name', $pet->Name) }}" required>
                            @error('Name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="Age" class="form-label">Age</label>
                            <input type="number" class="form-control @error('Age') is-invalid @enderror" id="Age" name="Age" value="{{ old('Age', $pet->Age) }}" min="0">
                            @error('Age')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="Street" class="form-label">Street</label>
                            <input type="text" class="form-control @error('Street') is-invalid @enderror" id="Street" name="Street" value="{{ old('Street', $pet->Street) }}">
                            @error('Street')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="City" class="form-label">City</label>
                            <input type="text" class="form-control @error('City') is-invalid @enderror" id="City" name="City" value="{{ old('City', $pet->City) }}">
                            @error('City')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="ZipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control @error('ZipCode') is-invalid @enderror" id="ZipCode" name="ZipCode" value="{{ old('ZipCode', $pet->ZipCode) }}">
                            @error('ZipCode')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="State" class="form-label">State</label>
                            <input type="text" class="form-control @error('State') is-invalid @enderror" id="State" name="State" value="{{ old('State', $pet->State) }}">
                            @error('State')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="TypeofPet" class="form-label">Type of Pet</label>
                            <input type="text" class="form-control @error('TypeofPet') is-invalid @enderror" id="TypeofPet" name="TypeofPet" value="{{ old('TypeofPet', $pet->TypeofPet) }}">
                            @error('TypeofPet')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('pets.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
