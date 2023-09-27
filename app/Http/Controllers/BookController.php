<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $books = Book::query()->when($request->input('search'), function (Builder $query, string $search) use ($request) {
                if ($request->input('search_by') == "author") {
                    $query->whereHas('authors', function ($authors) use ($search) {
                        $authors->where('name', 'like', '%' . $search . '%')
                            ->orWhere('surname', 'like', '%' . $search . '%');
                    });
                } elseif ($request->input('search_by') == "book") {
                    $query->where('title', 'like', '%' . $search . '%');
                }
                })->orderBy("purchases_current_month_count", "DESC")
                    ->paginate()
                    ->withQueryString();

        return view('books.index', ['books' => $books]);
    }

    /**
     * @param Book $book
     * @return Application|Factory|View
     */
    public function show(Book $book): View
    {
        return view('books.show', ['book' => $book]);
    }
}
