<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestBooks = Book::limit(8)
            ->latest()
            ->get();

        $mostViewedBooks = Book::where('viewed', '>', 0)
            ->limit(8)
            ->orderBy('viewed', 'desc')
            ->get();

        return view('home.index', compact('latestBooks', 'mostViewedBooks'));
    }
}
