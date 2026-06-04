@extends('layout')
@section('title', 'User Dashboard')

<?php session()->put('operationname', 'movies'); ?>
@section('content')

<style>
/* Card Container */
.movie-card {
    background-color: #1e1e24;
    color: #ffffff;
    max-width: 400px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 20px auto;
}

/* Image Styling */
.movie-poster {
    width: 100%;
    height: auto;
    display: block;
    border-bottom: 3px solid #00adb5; /* Adds a nice colorful accent line */
}

/* Details Padding Wrapper */
.movie-details {
    padding: 20px;
}

/* Title styling */
.movie-title {
    margin: 0 0 10px 0;
    font-size: 24px;
    color: #00adb5;
}

/* Your original review text */
.movie-review {
    font-style: italic;
    color: #e0e0e0;
    background: rgba(255, 255, 255, 0.05);
    padding: 10px;
    border-left: 3px solid #ff2e63;
    border-radius: 4px;
    margin-bottom: 15px;
}

/* Metadata (Genre, Release date, etc.) */
.movie-meta {
    font-size: 14px;
    margin: 8px 0;
    color: #b3b3b3;
}

/* Long Description styling */
.movie-description {
    font-size: 14px;
    line-height: 1.5;
    margin-top: 15px;
    color: #cfcfcf;
}
.card-body {
    display: flex;
    flex-direction: row;
    background: #352c2c;
}



</style>


<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-12">
            <div class="card rounded-0 border-0 shadow-sm">
                
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0">Movie List</h5>
                    <div>
                        <span class="badge bg-primary me-2">
                            Total movies: {{ $data->total() }}
                        </span>
                        <a href="/movies/create" class="btn btn-success btn-sm">
                            + Add Movie
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-0 w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-hover table-striped mb-0 align-middle w-100">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Synopsis</th>
                                    <th>Cover Image</th>
                                    <th width="180">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $movie)
                                    <tr>
                                        <td>{{ $movie->id }}</td>
                                        <td class="fw-semibold">{{ $movie->title }}</td>
                                        <td>{{ $movie->description ?? 'N/A' }}</td>
                                        <td>{{ $movie->author->name ?? 'No Author' }}</td>
                                        <td>{{ $movie->synopsis ?? 'No Synopsis' }}</td>
                                        <td>
                                            @if($movie->cover_image)
                                                <img src="{{ asset('storage/' . $movie->cover_image) }}" 
                                                     alt="Cover" class="img-thumbnail" 
                                                     style="width: 60px; height: 80px; object-fit: cover;">
                                            @else
                                                <span class="badge bg-light text-muted border">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/movies/edit/{{ $movie->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="/movies/delete/{{ $movie->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE') 
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">No movies found in the database.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-center p-3">
                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection