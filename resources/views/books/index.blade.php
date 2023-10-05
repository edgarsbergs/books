@extends('layouts/default')

@section('content')
    <div class="mb-3">
        <form method="GET" action="/" class="input-group mb-3">
            <div>
                <label for="search_author">{{ __('content.search_by_author') }}</label>
                <input type="radio" name="search_by" id="search_author" value="author"/>
                <label for="search_book">{{ __('content.search_by_book_title') }}</label>
                <input type="radio" name="search_by" id="search_book" value="book"/>
            </div>
            <input type="text" class="form-control" id="search" name="search" placeholder="" value="{{ app('request')->input('search') }}">
            <button type="submit" class="btn btn-secondary">{{ __('content.search') }}</button>
        </form>
    </div>

    <div class="row row-cols-3 g-3">
        @foreach($books as $book)
            <div class="card">
                {{ __('content.purchases_this_month') }} {{ $book->purchases_current_month_count }}
                <br /> {{ __('content.total') }}
                {{ $book->purchases_count }}
                <a href="{{ route("showBook", $book->id) }}" title="{{ $book->title }}">
                    <img class="card-img-top" src="//placehold.co/200x150?font=roboto" alt="{{ $book->title }}">
                </a>
                <div class="card-body">
                    <a href="{{ route("showBook", $book->id) }}" title="{{ $book->title }}">
                        <h5 class="card-title">{{ $book->title }}</h5>
                    </a>
                    <strong>{{ __('content.authors') }}</strong> @foreach ($book->authors as $author)
                        {{ $author->name }} {{ $author->surname }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                    <hr />
                    <p class="card-text">{{ $book->description }}</p>
                    <purchase-button :book-id='{{ $book->id }}'></purchase-button>
                    <a href="{{ route("showBook", $book->id) }}" class="btn btn-secondary">{{ __('content.view') }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="my-3">
        {{ $books->links() }}
    </div>
@endsection
