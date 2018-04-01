<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Requests\Admin\StoreBookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate();

        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(StoreBookRequest $request)
    {
        $book = new Book();
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->description = $request->get('description');
        $book->download_url = $request->get('download_url');
        $book->created_by = auth()->user()->id;

        if ($request->hasFile('cover_photo')) {
            $coverPhoto = $request->file('cover_photo');
            $book->cover_photo = $coverPhoto->openFile()->fread($coverPhoto->getSize());
        }

        $book->save();

        return redirect()->route('admin.book.create')
            ->with('create_book_success', 'Đã Thêm Sách Thành Công');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.book.edit', compact('book'));
    }

    public function update($id, StoreBookRequest $request)
    {
        $book = Book::findOrFail($id);

        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->description = $request->get('description');
        $book->download_url = $request->get('download_url');

        if ($request->hasFile('cover_photo')) {
            $coverPhoto = $request->file('cover_photo');
            $book->cover_photo = $coverPhoto->openFile()->fread($coverPhoto->getSize());
        }

        $book->save();

        return redirect()->route('admin.book.index')
            ->with('success_message', 'Đã Sửa Sách Thành Công');
    }

    public function remove($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->back()
            ->with('success_message', "Đã Xóa Sách Thành Công");
    }
}
