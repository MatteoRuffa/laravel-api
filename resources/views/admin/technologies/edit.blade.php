@section('title', 'Admin Dashboard / Technologies')
@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST" class="py-5" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group my-3 fs-5 fw-medium">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ $technology->name }}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-3">
        <label for="color" class="fs-5 fw-medium">Color</label>
        <select class="form-control @error('color') is-invalid @enderror" id="color" name="color" required>
            <option value="">Select Color by technology</option>
            @foreach($technologies as $tech)
                <option value="{{ $tech->id }}" {{ $tech->color == $technology->id ? 'selected' : '' }}>{{ $tech->name }}</option>
            @endforeach
        </select>
        @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-3">
        <label for="icon" class="fs-5 fw-medium">icon</label>
        <select class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" required>
            <option value="">Select icon by technology</option>
            @foreach($technologies as $tech)
                <option value="{{ $tech->id }}" {{ $tech->icon == $technology->id ? 'selected' : '' }}>{{ $tech->name }}</option>
            @endforeach
        </select>
        @error('icon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-start">
        <div class="p-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

        <div class="p-3">
            <a href="{{ route('admin.technologies.index', ['technology' => $technology->id]) }}"
                class="btn btn-secondary p-2">Return to the
                technology</a>
        </div>
    </div>
</form>
@endsection