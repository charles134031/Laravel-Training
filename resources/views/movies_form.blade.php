@extends('layout')

@section('title', isset($data) ? 'Edit Movie' : 'Add Movie')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($data) ? 'Edit Movie' : 'Add Movie' }}
        </h5>
    </div>

    <div class="card-body">

        <form
            action="{{ isset($data) ? route('movies.update', $data->id) : route('movies.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            
         
            @if(isset($data))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label" >Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $data->title ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input
                    type="text"
                    name="description"
                    class="form-control"
                    value="{{ old('description', $data->description ?? '') }}"
                    required>
            </div>

             <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    <option value="" disabled {{ old('author_id', $data->author_id ?? '') == '' ? 'selected' : '' }}>
                        -- Select Author --
                    </option>
                    
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id', $data->author_id ?? '') == $author->id ? 'selected' : '' }}>
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
                    value="{{ old('synopsis', $data->synopsis ?? '') }}">
            </div>

            

            

       

          

            <div class="mb-4">
                <label class="form-label fw-bold">Upload movie File / Cover</label>
                <input 
                    type="file" 
                    name="cover_image" 
                    class="form-control">
              
                @if(isset($data) && $data->cover_image)
                    <div class="mt-3">
                        <p class="mb-1">Current Cover Image:</p>
                        <img 
                            src="{{ asset('storage/' . $data->cover_image) }}" 
                            alt="Cover Image" 
                            class="img-thumbnail" 
                            style="width: 120px; height: 160px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('movies') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
</div>

@endsection