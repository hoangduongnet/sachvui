<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $books = [];
        $booksCount = 0;

        if ($keyword) {
            $books = Book::where('title', 'like', "%{$keyword}%")
                ->orWhere('author', 'like', "%{$keyword}%")
                ->oldest()
                ->paginate(16);

            $booksCount = Book::where('title', 'like', "%{$keyword}%")
                ->orWhere('author', 'like', "%{$keyword}%")
                ->count();
        }

        return view('search.index', compact('keyword', 'books', 'booksCount'));
    }
}
