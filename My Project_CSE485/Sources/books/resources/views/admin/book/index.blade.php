@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="page-header">
                <h1>Quản Lý Sách</h1>
            </div>

            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    <p>{{ session('success_message') }}</p>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sách</th>
                        <th>Tác Giả</th>
                        <th>Ảnh Bìa</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <div class="thumbnail" style="width: 100px; height: 150px;">
                                    <img src="{{ $book->thumbnail }}" style="width: 100%; height: 100%;">
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.book.remove', ['id' => $book->id]) }}" method="post" class="remove-book-form">
                                    <div class="form-group">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </div>
                                </form>
                                <a href="{{ route('admin.book.edit', ['id' => $book->id]) }}" class="btn btn-info">Sửa</a>
                            </td>
                        </tr>
                    @empty
                        <tr></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                {{ $books->links() }}
            </div>

        </div>
    </div>
@endsection
