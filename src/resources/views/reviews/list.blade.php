@extends('layout')
@section('content')
<h1>Reviews</h1>
@if (count($items) > 0)
<table class="table table-sm table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>User</th>
            <th>User</th>
            <th>Author</th>
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
                <a href="/reviews/update/{{ $review->id }}" class="btn btn-outline-primary btn-sm">Edit</a> /
                <form method="post" action="/reviews/delete/{{ $review->id }}" class="d-inline deletion-form">
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
<a href="/reviews/create" class="btn btn-primary">Add a review</a>
@endsection