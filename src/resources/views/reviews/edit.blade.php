@extends('layout')

@section('content')
    <h1>Edit Review</h1>

    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf

        <div>
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" required>
        </div>

        <div>
            <label for="book_id">Product ID:</label>
            <input type="text" name="book_id" id="book_id" required>
        </div>

        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required>
        </div>

        <div>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="4" required></textarea>
        </div>

        <button type="submit">Submit Review</button>
    </form>
@endsection