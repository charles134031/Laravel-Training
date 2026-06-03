@extends('layout')

@section('title', isset($book) ? 'Edit Book' : 'Add Book')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($book) ? 'Edit Book' : 'Add Book' }}
        </h5>
    </div>

    <div class="card-body">

        <form
            action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            
            {{-- 💡 BUG FIX 1: Method Spoofing para sa Edit Route --}}
            @if(isset($book))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $book->title ?? '') }}">
            </div>

        <div class="mb-3">
    <label for="author_id" class="form-label">Author</label>
    <select name="author_id" id="author_id" class="form-control" required>
        <option value="" disabled {{ old('author_id', $book->author_id ?? '') == '' ? 'selected' : '' }}>
            -- Select Author --
        </option>
        
        @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input
                    type="text"
                    name="genre"
                    class="form-control"
                    value="{{ old('genre', $book->genre ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Publication Year</label>
                <input
                    type="number"
                    name="published_year"
                    class="form-control"
                    value="{{ old('published_year', $book->published_year ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Upload Book File / Cover</label>
                <input 
                    type="file" 
                    name="book_file" 
                    class="form-control">
                
                {{-- 💡 BUG FIX 2: pinalitan ng $book->cover para tugma sa controller mo --}}
                @if(isset($book) && $book->cover)
                    <div class="form-text text-muted mt-1">
                        Current file: <span class="badge bg-light text-dark border">{{ $book->cover }}</span>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('books') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
</div>

@endsection