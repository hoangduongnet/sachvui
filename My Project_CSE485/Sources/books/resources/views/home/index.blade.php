@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="page-header">
            <h2 class="h1">Sách Mới Cập Nhật</h2>
        </div>

        <div class="row">
            @forelse($latestBooks as $book)
                <div class="col-lg-3">
                    @include('book._book', ['book' => $book])
                </div>
                @if($loop->iteration % 4 === 0)
                    <div class="clearfix visible-lg-block"></div>
                @endif
            @empty
            <div class="col-lg-12">
                <p>Không Có Sách Nào</p>
            </div>
            @endforelse
        </div>

        <div class="page-header">
            <h2 class="h1">Sách Xem Nhiều Nhất</h2>
        </div>

        <div class="row">
            @forelse($mostViewedBooks as $book)
                <div class="col-lg-3">
                    @include('book._book', ['book' => $book])
                </div>
                @if($loop->iteration % 4 === 0)
                    <div class="clearfix visible-lg-block"></div>
                @endif
            @empty
            <div class="col-lg-12">
                <p>Không Có Sách Nào</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
