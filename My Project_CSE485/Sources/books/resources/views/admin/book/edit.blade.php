@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="page-header">
                <h1>Sửa Sách</h1>
            </div>

            @if(session()->has('create_book_success'))
                <div class="alert alert-success">
                    {{ session('create_book_success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <form method="post" action="{{ route('admin.book.update', ['id' => $book->id]) }}" enctype="multipart/form-data">

                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            <label for="title">Tên Sách</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Tên Sách" value="{{ old('title', $book->title) }}">
                            @if($errors->has('title'))
                                <p class="help-block">{{ $errors->first('title') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('author')) has-error @endif">
                            <label for="author">Tác Giả</label>
                            <input type="text" class="form-control" name="author" id="author"
                                   placeholder="Tác Giả" value="{{ old('author', $book->author) }}">
                            @if($errors->has('author'))
                                <p class="help-block">{{ $errors->first('author') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="description">Giới Thiệu</label>
                            <textarea name="description" id="description" class="form-control" rows="6">{{ old('description', $book->description) }}</textarea>
                            @if($errors->has('description'))
                                <p class="help-block">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('download_url')) has-error @endif">
                            <label for="download_url">Download URL</label>
                            <input type="url" class="form-control" name="download_url" id="download_url" placeholder="Download URL" value="{{ old('download_url', $book->download_url) }}">
                            @if($errors->has('download_url'))
                                <p class="help-block">{{ $errors->first('download_url') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('cover_photo')) has-error @endif">
                            <label for="cover_photo">Ảnh Bìa</label>
                            @if($book->hasThumbnail())
                                <img src="{{ route('book.thumbnail', ['id' => $book->id]) }}" class="thumbnail" style="width: 100px;">
                            @endif
                            <input type="file" class="form-control" name="cover_photo" id="cover_photo" placeholder="Ảnh Bìa">
                            @if($errors->has('cover_photo'))
                                <p class="help-block">{{ $errors->first('cover_photo') }}</p>
                            @endif
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Lưu Sách</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
