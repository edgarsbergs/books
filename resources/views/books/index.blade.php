@extends('layouts/default')

@section('content')
    <div class="mb-3">
        <form method="GET" action="/" class="input-group mb-3">
            <input type="text" class="form-control" id="search" name="search" placeholder="" value="{{ app('request')->input('search') }}">
            <button type="submit" class="btn btn-secondary">Meklēt</button>
        </form>
    </div>

    <div>
    @foreach($books as $book)
        <div class="card" style="width:20%">
            <ul>
                <li>Pirkumi šomēnes: {{ $book->purchases_current_month_count }}</li>
                <li>Pirkumi kopā: {{ $book->purchases_count }}</li>
            </ul>
            <a href="{{ route("showBook", $book->id) }}" title="{{ $book->title }}">
                <img class="card-img-top" src="//placehold.co/200x150?font=roboto" alt="{{ $book->title }}">
            </a>
            <div class="card-body">
                <a href="{{ route("showBook", $book->id) }}" title="{{ $book->title }}">
                    <h5 class="card-title">{{ $book->title }}</h5>
                </a>
                <p class="card-text">{{ $book->description }}</p>
                <a href="#" class="btn btn-success">Pirkt</a>
                <a href="{{ route("showBook", $book->id) }}" class="btn btn-secondary">Skatīt</a>
            </div>
        </div>
    @endforeach
    </div>

    <div class="my-3">
    {{ $books->links() }}
    </div>
@endsection
