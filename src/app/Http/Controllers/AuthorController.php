<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function list()
    {
        $items = Author::orderBy('name', 'asc')->get();
        return view(
            'author.list',
            [
                'title' => 'Authors',
                'items' => $items
            ]
        );
    }

}
