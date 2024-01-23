@extends('layout')
@section('content')
<h1>Reviews</h1>
@if (count($items) > 0)
<table class="table table-sm table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>User</th>
            <th>Product</th>
            <th>Rating</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->book->name }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->comment }}</td>
            <td>
                <a href="/review/update/{{ $review->id }}" class="btn btn-outline-primary btn-sm">Edit</a> /
                <form method="post" action="/review/delete/{{ $review->id }}" class="d-inline deletion-form">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No entries found in database </p>
@endif
<a href="/review/create" class="btn btn-primary">Add a review</a>
@endsection
<!-- @extends('layout')

@section('content')
<h1>Reviews</h1>
<table class="table table-sm table-hover table-striped">
    <thead class="thead-light">
    @foreach ($reviews as $review)
    <tr>
        <th>User: {{ $review->user->name }}</th>
        <th>Product: {{ $review->book_id }}</th>
        <th>Rating: {{ $review->rating }}</th>
        <th>Comment: {{ $review->comment }}</th>
    </tr>
    </thead>
    <form method="post" action="/books/delete/{{ $book->id }}" class="d-inline deletion-form">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
    </form>
    <hr>
    @endforeach
</table>
<a href="/reviews/create" class="btn btn-primary">Add new review</a>
@endsection -->