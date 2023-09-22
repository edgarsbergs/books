@extends('layouts/default')

@section('content')
    <a href="{{ route("books") }}">Visas grāmatas</a>
    <div class="row">
        <div class="col col-3">
            <img class="card-img-top" src="//placehold.co/200x150?font=roboto" alt="{{ $book->title }}">
        </div>
        <div class="col col-9">
            <h5 class="card-title">{{ $book->title }}</h5>
            Autori: {{ $book->authors->pluck('name')->implode(', ') }}
            <p class="card-text">{{ $book->description }}</p>
            <p>Kopā nopirkts <span id="purchases_count">{{ $book->purchases_count }}</span> reizes</p>
            <button class="btn btn-success">Pirkt</button>
        </div>
    </div>

@endsection
