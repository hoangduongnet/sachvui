<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(16);

        $booksCount = Book::count();

        return view('book.index', compact('books', 'booksCount'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $book->increment('viewed');

        $randomBooks = Book::limit(4)->inRandomOrder()->get();

        return view('book.show', compact('book', 'randomBooks'));
    }

    public function thumbnail($id)
    {
        $book = Book::findOrFail($id);

        $img = Image::cache(function($image) use ($book) {
            return $image->make($book->cover_photo)
                ->resize(200, 300);
        }, 10, true);

        return $img->response('jpg', 80);
    }
}
