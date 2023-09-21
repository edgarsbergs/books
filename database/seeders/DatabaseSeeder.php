<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookPurchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Book::factory(50)->create();
        Author::factory(10)->create();

        Book::all()->each(function (Book $book) {
            $purchases = rand(0, 20);
            for ($i = 0; $i <= $purchases; $i++) {
                BookPurchase::insert([
                    'book_id' => $book->id,
                    'created_at' => Carbon::now()->subMonths(rand(0, 1)),
                ]);
            }
        });
/*
        BookPurchase::all()->each(function (BookPurchase $purchase) {
            $purchase->update(['created_at' => Carbon::now()->subMonths(rand(0,1))]);
        });
*/
    }
}
