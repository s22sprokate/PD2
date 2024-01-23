<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view(
            'home.index',
            ['title' => 'Homepage']
        );
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
