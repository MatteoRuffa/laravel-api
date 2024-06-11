@section('title', 'Admin Dashboard / Technologies')
@extends('layouts.admin')


@section('content')
    <section class="container py-5">


        <div class="container">
            <h1 class=" fw-bolder text-center ">Add a Technology</h1>

            <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                
                <div class="mb-3 @error('title') @enderror">
                    <label for="name" class="form-label fs-5 fw-medium">Technology name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" name="name" value="{{ old('name') }}" required maxlength="255" >
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 @error('color') @enderror">
                    <label for="color" class="form-label fs-5 fw-medium">Technology color</label>
                    <select class="form-control @error('color') is-invalid @enderror" id="color" name="color" required>
                        <option value="">Select a type</option>
                        @foreach ($technologies as $technology)
                            <option value="{{ $technology->color }}" {{ old('color') == $technology->color ? 'selected' : '' }}>
                                {{ $technology->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 @error('icon') @enderror">
                    <label for="icon" class="form-label fs-5 fw-medium">Technology icon</label>
                    <select class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" required>
                        <option value="">Select a type</option>
                        @foreach ($technologies as $technology)
                            <option value="{{ $technology->icon }}" {{ old('icon') == $technology->icon ? 'selected' : '' }}>
                                {{ $technology->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('icon')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <br>
                <div class="text-center w-25 mx-auto d-flex gap-2">
                    <button type="submit" class="btn ">Add the Technology</button>
                    <a href="{{ route('admin.technologies.index') }}"
                        class="btn ">Back</a>
                </div>
            </form>
        </div>

    </section>
@endsection