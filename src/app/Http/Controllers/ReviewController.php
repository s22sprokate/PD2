<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('rating', 'asc')->get();
        return view(
            "reviews.list",
            [
                'title' => 'Reviews',
                'items' => $reviews,
            ]
        );
    }

    public function create()
    {
        $books = Book::orderBy('name', 'asc')->get();
        return view(
            "reviews.create",

            [
                'title' => "Add review",
                "review" => new Review(),
                "books" => $books,
            ]
        );
    }

    public function put(ReviewRequest $request)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $this->saveReviewData($review, $request);
        return redirect('/reviews');
    }

    public function update(Review $review)
    {
        $books = Book::orderBy('name', 'asc')->get();
        return view(
            'reviews.create',
            [
                'title' => 'Edit book',
                'review' => $review,
                'books' => $books,
            ]
        );
    }

    public function patch(Review $reviews, ReviewRequest $request)
    {
        return redirect('/reviews/update/' . $reviews->id);
    }


    public function delete(Review $review)
    {
        $review->delete();
        return redirect("/reviews");
    }

    private function saveReviewData(Review $review, Request $request)
    {
        $validatedData = $request->validated();
        $review->fill($validatedData);
        $review->save();
    }
}