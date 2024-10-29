<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public function game() {
        return $this->belongsTo(Game::class);
    }

    /**
     * Scope to filter the reviews by a specific (optional) date range.
     * @param Builder $query
     * @param string|null $from from date for created_at of reviews
     * @param string|null $to to date for created_at of reviews
     */
    public function scopeFilterByDateRange(Builder $query, ?string $from = null, ?string $to = null) {
        if (!$from && !$to) {
            return;
        }
        if ($from && !$to) {
            $query->where('created_at', '>=', $from);
            return;
        }
        if (!$from && $to) {
            $query->where('created_at', '<=', $to);
            return;
        }

        $query->whereBetween('created_at', [$from, $to]);
    }
}
