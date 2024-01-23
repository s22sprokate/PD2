@extends('layout')

@section('content')
    <h1>Reviews</h1>

    @foreach ($reviews as $review)
        <div>
            <p>User: {{ $review->user_id }}</p>
            <p>Product: {{ $review->product_id }}</p>
            <p>Rating: {{ $review->rating }}</p>
            <p>Comment: {{ $review->comment }}</p>
        </div>
        <hr>
    @endforeach
<a href="/reviews/create" class="btn btn-primary">Add new review</a>
@endsection