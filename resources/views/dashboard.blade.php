@extends('layout')
@section('title', 'User Dashboard')
<?php session()->put('operationname', 'dashboard'); ?>
@section('content')

<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <p>
            Welcome! This is your user dashboard. You can put any content here that you want to show to the user after they log in. You can also use this page to show the user's profile information, or any other information that you want to show to the user after they log in.
        </p>
    </div>
</div>

@endsection