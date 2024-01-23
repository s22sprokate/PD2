<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DataController extends Controller
{
    public function getTopBooks()
    {
        $books = Book::where('display', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $books;
    }

    public function getBook(Book $book)
    {
        $selectedBook = Book::where([
            'id' => $book->id,
            'display' => true,
        ])
            ->firstOrFail();
        return $selectedBook;
    }
    
    public function getRelatedBooks(Book $book)
    {
        $books = Book::where('display', true)
            ->where('id', '<>', $book->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $books;
    }

}
