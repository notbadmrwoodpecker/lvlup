<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    /**
     * Scope which finds the most popular games based on the
     * amount of reviews (optionally within a specific date range).
     * @param Builder $query
     * @param string|null $from from date for created_at of reviews
     * @param string|null $to to date for created_at of reviews
     *
     * @return Builder extended query
     */
    public function scopePopular(Builder $query, $from = null, $to = null): Builder {
        return $query->withCount(['reviews' => fn(Builder $q) => $q->filterByDateRange($from, $to)])->orderBy('reviews_count', 'desc');
    }

    /**
     * Scope which finds the highest rated games based on the
     * average rating of reviews (optionally within a specific date range).
     * @param Builder $query
     * @param string|null $from from date for created_at of reviews
     * @param string|null $to to date for created_at of reviews
     *
     * @return Builder extended query
     */
    public function scopeHighestRated(Builder $query, string $from = null, string $to = null): Builder {
        return $query->withAvg(['reviews' => fn(Builder $q) => $q->filterByDateRange($from, $to)], 'rating')->orderBy('reviews_avg_rating', 'desc');
    }

    public function scopeMinimumReviews(Builder $query, int $minimumAmountOfReviews): Builder {
        return $query->having('reviews_count', '>=', $minimumAmountOfReviews);
    }
}
