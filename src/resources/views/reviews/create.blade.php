@extends('layout')

@section('content')
<h1>Create Review</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">Please fix the validation errors!</div>
@endif
<form method="POST" action="{{ $review->exists ? '/reviews/patch' . $review->id : '/reviews/put'}}">
    @csrf
    <div class="mb-3">
        <label for="product-id" class="form-label">Product name</label>
        <select id="product-id" name="book_id" class="form-select @error('book_id') is-invalid @enderror">
            <option value="">Choose the book!</option>
            @foreach($books as $book)
            <option value="{{ $book->id }}" @if ($book->id == old('book_id', $review->book->id ?? false)) selected
                @endif
                >{{ $book->name }}</option>
            @endforeach
        </select>
        @error('book_id')
        <p class="invalid-feedback">{{ $errors->first('book_id') }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" min="1" max="5"step="1" lang="en" id="rating" name="rating"
            value="{{ old('rating', $review->rating) }}" class="form-control @error('price') is-invalid @enderror">
        @error('rating')
        <p class="invalid-feedback">{{ $errors->first('rating') }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" rows="4" required></textarea>
        @error('comment')
        <p class="invalid-feedback">{{ $errors->first('comment') }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">
        {{ $review->exists ? 'Update' : 'Create' }}
    </button>
</form>
@endsection