@extends('layouts.app')

@section('title', 'Pet Detail')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pet Detail</h4>

                <dl class="row">
                    <dt class="col-sm-3">Pet ID</dt>
                    <dd class="col-sm-9">{{ $pet->PetID }}</dd>

                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $pet->Name }}</dd>

                    <dt class="col-sm-3">Age</dt>
                    <dd class="col-sm-9">{{ $pet->Age ?? '–' }}</dd>

                    <dt class="col-sm-3">Street</dt>
                    <dd class="col-sm-9">{{ $pet->Street ?? '–' }}</dd>

                    <dt class="col-sm-3">City</dt>
                    <dd class="col-sm-9">{{ $pet->City ?? '–' }}</dd>

                    <dt class="col-sm-3">Zip Code</dt>
                    <dd class="col-sm-9">{{ $pet->ZipCode ?? '–' }}</dd>

                    <dt class="col-sm-3">State</dt>
                    <dd class="col-sm-9">{{ $pet->State ?? '–' }}</dd>

                    <dt class="col-sm-3">Type of Pet</dt>
                    <dd class="col-sm-9">{{ $pet->TypeofPet ?? '–' }}</dd>
                </dl>

                <div class="d-flex gap-2">
                    <a href="{{ route('pets.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
