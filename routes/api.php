<?php

use App\Models\Book;
use App\Models\BookPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books/top/{limit?}', function ($limit = 10) {
    return Book::query()->orderBy("purchases_current_month_count", "DESC")->take($limit)->get();
});
Route::post('/books/{book:id}/purchase', function (Book $book) {
    return BookPurchase::create(['book_id' => $book->id]);
});
