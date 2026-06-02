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
    gap: 20px;
}



</style>

<div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-10">
                
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0">Book Inventory</h4>
                        <span class="badge bg-light text-primary fw-bold">Total: {{ $data->total() }} books</span>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="ps-4">id </th>
                                        <th scope="col">title</th>
                                        <th scope="col">author</th>
                                        <th scope="col">isbn </th>
                                        <th scope="col">description</th>
                                        <th scope="col">published_year</th>
                                        <th scope="col">page_count</th>
                                        

                                        <th scope="col" class="pe-4">Pages</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $book)
                                        <tr>
                                            <td class="fw-bold ps-4 text-muted">{{ $book->id }}</td>
                                            <td class="fw-semibold text-dark">{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                             <td class="fw-semibold text-dark">{{ $book->isbn  }}</td>
                                          
                                            <td>
                                                <span class="badge bg-secondary text-capitalize">{{ $book->genre ?? 'N/A' }}</span>
                                            </td>
                                            <td>{{ $book->published_year ?? 'N/A' }}</td>
                                             
                                            <td class="pe-4 text-muted">{{ $book->page_count ?? 'N/A' }} pages</td>
                                              <td class="fw-semibold text-dark">{{ $book->genre  }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <p class="mb-0 fs-5">No books found in the database.</p>
                                                <small>Did you forget to run your seeder?</small>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card-footer bg-white py-3 d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="card overflow-hidden mt-5">
    <div class="card-body pt-3">
        <div class="movie-card">
                <img src="{{ asset('images/book(1).jpg') }}" alt="Avatar Movie Poster" class="movie-poster">
                
                <div class="movie-details">
                    <h2 class="movie-title">Better Than Movies</h2>
                    
                    <p class="movie-review">"ELSA"</p>
                    
                    <p class="movie-meta"><strong>Genre:</strong> Sci-Fi, Adventure, Action</p>
                    <p class="movie-meta"><strong>Release Date:</strong> December 18, 2009</p>
                    <p class="movie-meta"><strong>pages:</strong> 324</p>
                    
                    <p class="movie-description">
                        <strong>Description:</strong> Desperate to get his attention, Liz strikes a deal with her annoying, chaotic next-door neighbor, Wes Bennett. Wes is childhood friends with Michael, making him the perfect undercover ally. They agree to fake a mutual connection so Wes can help Liz win Michael over. But as Liz and Wes scheme together, Liz starts to realize that real life doesn't always follow a Hollywood script—and the guy she's supposed to be with might not be the one she originally envisioned.
                </div>
            </div>


            <div class="movie-card">
                <img src="{{ asset('images/book2.jpeg') }}" alt="Avatar Movie Poster" class="movie-poster">
                
                <div class="movie-details">
                    <h2 class="movie-title">Throne of glass</h2>
                    
                    <p class="movie-review">"KANDING"</p>
                    
                    <p class="movie-meta"><strong>Genre:</strong> Sci-Fi, Adventure, Action</p>
                    <p class="movie-meta"><strong>Release Date:</strong> December 18, 2009</p>
                    <p class="movie-meta"><strong>pages:</strong> 500</p>
                    
                    <p class="movie-description">
                        <strong>Description:</strong> Her chance at freedom arrives when the Crown Prince, Dorian Havilliard, offers her a deal: compete as his proxy in a brutal, months-long tournament against 23 other deadly thieves, assassins, and warriors. If she wins, she must serve as the King’s Champion (his personal enforcer) for several years, after which she will receive a full pardon and her total freedom.
                    </p>
                </div>
            </div>

            <div class="movie-card">
                <img src="{{ asset('images/book3.avif') }}" alt="Avatar Movie Poster" class="movie-poster">
                
                <div class="movie-details">
                    <h2 class="movie-title">Every book tells a story</h2>
                    
                    <p class="movie-review">"KANDING"</p>
                    
                    <p class="movie-meta"><strong>Genre:</strong> Sci-Fi, Adventure, Action</p>
                    <p class="movie-meta"><strong>Release Date:</strong> December 18, 2009</p>
                    <p class="movie-meta"><strong>pages:</strong> 700</p>
                    
                    <p class="movie-description">
                        <strong>Description:</strong> The phrase "Every book tells a story" is a timeless truth that goes far deeper than just the plot written on its pages. It speaks to the layers of history, emotion, and human connection embedded in the very existence of a book. At its most literal level, a book is a vessel for imagination or information. Whether it’s a gripping mystery, a sweeping historical epic, or a raw memoir, the primary story is the one the author
                    </p>
                </div>
            </div>  
        </p>
    </div>
</div>






@endsection