@extends('layout')

@section('title', isset($authordata) ? 'Edit Author' : 'Add Author')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($authordata) ? 'Edit Author' : 'Add Author' }}
        </h5>
    </div>

    <div class="card-body">

        <form
            action="{{ isset($authordata)
                ? route('author.update', $authordata->id)
                : route('author.store') }}"
            method="POST">

            @csrf
            @if(isset($authordata))
                @method('POST') @endif

            <div class="mb-3">
                <label class="form-label">Author Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $authordata->name ?? '') }}" required>
            </div>

            <button
                type="submit"
                class="btn btn-primary">
                Save
            </button>

            <a
                href="{{ route('author') }}"
                class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection