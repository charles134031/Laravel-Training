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



<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <div class="movie-card">
                <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar Movie Poster" class="movie-poster">
                
                <div class="movie-details">
                    <h2 class="movie-title">Avatar</h2>
                    
                    <p class="movie-review">"ELSA"</p>
                    
                    <p class="movie-meta"><strong>Genre:</strong> Sci-Fi, Adventure, Action</p>
                    <p class="movie-meta"><strong>Release Date:</strong> December 18, 2009</p>
                    <p class="movie-meta"><strong>Duration:</strong> 2h 42m</p>
                    
                    <p class="movie-description">
                        <strong>Description:</strong> A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.
                    </p>
                </div>
            </div>


            <div class="movie-card">
                <img src="{{ asset('images/little.avif') }}" alt="Avatar Movie Poster" class="movie-poster">
                
                <div class="movie-details">
                    <h2 class="movie-title">Little Women</h2>
                    
                    <p class="movie-review">"KANDING"</p>
                    
                    <p class="movie-meta"><strong>Genre:</strong> Sci-Fi, Adventure, Action</p>
                    <p class="movie-meta"><strong>Release Date:</strong> December 18, 2009</p>
                    <p class="movie-meta"><strong>Duration:</strong> 2h 42m</p>
                    
                    <p class="movie-description">
                        <strong>Description:</strong> A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.
                    </p>
                </div>
            </div>
        
        </p>
    </div>
</div>

@endsection