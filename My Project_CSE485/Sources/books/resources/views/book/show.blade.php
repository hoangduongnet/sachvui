@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="page-header">
                <h1>{{ $book->title }}</h1>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}" class="thumbnail" style="width: 100%;">
                </div>
                <div class="col-lg-9">
                    @if($book->author)
                        <p>Tác Giả: {{ $book->author }}</p>
                    @endif
                    @if($book->description)
                        <p>{{ $book->description }}</p>
                    @endif

                    @if($book->hasDownloadUrl())
                        <a href="{{ $book->download_url }}" class="btn btn-lg btn-primary" target="_blank">Tải Xuống</a>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2>Sách Ngẫu Nhiên</h2>
            </div>
            <div class="row">
                @foreach($randomBooks as $book)
                    <div class="col-lg-3">
                        @include('book._book', ['book' => $book])
                    </div>
                    @if($loop->iteration % 4 === 0)
                        <div class="clearfix visible-lg-block"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
