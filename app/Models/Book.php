<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Book extends Model
{
    use HasFactory;

    protected $withCount = ['purchases', 'purchasesCurrentMonth'];
    protected $with = ['authors'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(BookPurchase::class);
    }

    public function purchasesCurrentMonth(): HasMany
    {
        return $this->purchases()->whereMonth("created_at", "=", Carbon::now()->month);
    }
}
