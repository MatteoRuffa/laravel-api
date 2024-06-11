@section('title', 'Admin Dashboard / Technologies')
@extends('layouts.admin')

@section('content')
    <section class="my-5">
        <h1 class=" m-3">All Technologies</h1>
        <a role="button" class="btn btn-add mb-3" href="{{ route('admin.technologies.create') }}">Add a Technologies</a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @include('partials.table', ['elements' => $technologies, 'elementName' => 'technologie'])
        {{$technologies->links('vendor.pagination.bootstrap-5')}} 
    </section>
    
@endsection
