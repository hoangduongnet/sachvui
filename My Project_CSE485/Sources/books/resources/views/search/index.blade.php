@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="page-header">
                <h1>
                    Kết Quả Tìm Kiếm
                    <small>
                        Tìm Thấy {{ $booksCount }} Sách
                    </small>
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
                    <div class="alert alert-danger text-center">
                        <h3 class="text-uppercase">Không Tìm Thấy Kết Quả Nào</h3>
                    </div>
                @endforelse

            </div>

            @if($books)
            <div class="text-center">
                {{ $books->appends(['keyword' => $keyword])->links() }}
            </div>
            @endif

        </div>
    </div>
@endsection
