@extends('layouts/default')

@section('content')
    <a href="{{ route("books") }}">{{ __('content.all_books') }}</a>
    <div class="row">
        <div class="col col-3">
            <img class="card-img-top" src="//placehold.co/200x150?font=roboto" alt="{{ $book->title }}">
        </div>
        <div class="col col-9">
            <h5 class="card-title">{{ $book->title }}</h5>
            <strong>{{ __('content.authors') }}</strong>
            @foreach ($book->authors as $author)
                {{ $author->name }} {{ $author->surname }}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
            <hr />
            <p class="card-text">{{ $book->description }}</p>
            <purchase-button :book-id='{{ $book->id }}'
                             :purchases-count="{{ $book->purchases_count }}"
                             :show-purchases="true"
            ></purchase-button>
        </div>
    </div>

@endsection
