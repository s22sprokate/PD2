@extends('layout')

@section('content')
    <h1>Review Details</h1>

    <p>User: {{ $review->user_id }}</p>
    <p>Product: {{ $review->product_id }}</p>
    <p>Rating: {{ $review->rating }}</p>

@endsection