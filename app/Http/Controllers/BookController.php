<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query()->when($request->input('search'), function (Builder $query, string $search) {
                $query->whereHas('authors', function ($authors) use ($search) {
                    $authors->where('name', 'like', '%' . $search . '%')
                            ->orWhere('surname', 'like', '%' . $search . '%');
        });
                })->orderBy("purchases_current_month_count", "DESC")
                    ->when($request->input('search'), function (Builder $query, string $search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    })
                    ->paginate()->withQueryString();

        return view('books.index', ['books' => $books]);
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }
}
