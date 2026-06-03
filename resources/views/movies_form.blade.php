@extends('layout')

@section('title', isset($movie) ? 'Edit Movie' : 'Add Movie')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($movie) ? 'Edit Movie' : 'Add Movie' }}
        </h5>
    </div>

    <div class="card-body">

        <form
            action="{{ isset($movie) ? route('movies.update', $movie->id) : route('movies.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            
            {{-- BUG FIX 1: Method Spoofing para sa Edit Route --}}
            @if(isset($movie))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $movie->title ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input
                    type="text"
                    name="description"
                    class="form-control"
                    value="{{ old('title', $movie->title ?? '') }}">
            </div>

             <div class="mb-3">
    <label for="author_id" class="form-label">Author</label>
    <select name="author_id" id="author_id" class="form-control" required>
        <option value="" disabled {{ old('author_id', $movie->author_id ?? '') == '' ? 'selected' : '' }}>
            -- Select Author --
        </option>
        
        @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ old('author_id', $movie->author_id ?? '') == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>

            <div class="mb-3">
                <label class="form-label">Synopsis</label>
                <input
                    type="text"
                    name="synopsis"
                    class="form-control"
                    value="{{ old('title', $movie->title ?? '') }}">
            </div>

            

            

       

          

            <div class="mb-4">
                <label class="form-label fw-bold">Upload movie File / Cover</label>
                <input 
                    type="file" 
                    name="cover_image" 
                    class="form-control">
                
                {{-- UG FIX 2: pinalitan ng $movie->cover para tugma sa controller mo --}}
                @if(isset($movie) && $movie->cover)
                    <div class="form-text text-muted mt-1">
                        Current file: <span class="badge bg-light text-dark border">{{ $movies->cover_image }}</span>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('movies') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
</div>

@endsection