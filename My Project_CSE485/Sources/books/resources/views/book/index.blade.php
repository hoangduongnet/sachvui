@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="page-header">
            <h1>
                Tất Cả Sách
                <small>(Tổng Số {{ $booksCount }} Sách)</small>
            </h1>
        </div>

        <div class="row">

            @forelse($books as $book)
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

        <div class="text-center">
            {{ $books->links() }}
        </div>

    </div>
</div>
@endsection
