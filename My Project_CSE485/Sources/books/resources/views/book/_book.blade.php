<div class="thumbnail">
    <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}">
    <div class="caption">
        <h4 class="text-capitalize">
            {{ $book->title }}
        </h4>
        <p>
            <a href="{{ route('book.show', ['id' => $book->id]) }}" class="btn btn-xs btn-primary">
                Xem Chi Tiết
            </a>
        </p>
    </div>
</div>
