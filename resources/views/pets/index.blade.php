@extends('layouts.app')

@section('title', 'Pets')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title mb-0">Pets</h4>
                    <a href="{{ route('pets.create') }}" class="btn btn-primary btn-sm">Add Pet</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th>Pet ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Type of Pet</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pets as $pet)
                            <tr>
                                <td>{{ $pet->PetID }}</td>
                                <td>{{ $pet->Name }}</td>
                                <td>{{ $pet->Age ?? '–' }}</td>
                                <td>{{ $pet->City ?? '–' }}</td>
                                <td>{{ $pet->TypeofPet ?? '–' }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="Pet actions">
                                        <a href="{{ route('pets.show', $pet) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this pet?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No pets found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $pets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
