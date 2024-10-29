<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $gamesQuery = Game::
            when($title, fn($query) => $query->title($title));

        $gamesQuery = match($filter) {
            'popular_last_month' => $gamesQuery->popularLastMonth(),
            'popular_last_6_months' => $gamesQuery->popularLast6Months(),
            'highest_rated_last_month' => $gamesQuery->highestRatedLastMonth(),
            'highest_rated_last_6_months' => $gamesQuery->highestRatedLast6Months(),
            default => $gamesQuery->withCount('reviews')->withAvg('reviews', 'rating')->latest()
        };

        $games = $gamesQuery->get();

        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
