@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Organization Sign-Up</h2>
        <form action="{{ route('sign-up.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="organization_name" class="form-label">Organization Name</label>
                <input type="text" class="form-control" id="organization_name" name="organization_name" required>
            </div>

            <div class="mb-3">
                <label for="organization_type" class="form-label">Organization Type</label>
                <select class="form-select" id="organization_type" name="organization_type" required>
                    <option value="">Select Organization Type</option>
                    @foreach ($organizationTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
@endsection
