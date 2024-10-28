@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-2xl relative inline-block mb-8 before:content-[''] before:absolute before:w-2/3 before:h-2/3 before:bg-violet-200 before:top-2.5 before:-left-2 before:-z-10">All game reviews</h1>

    <form method="GET" action="{{ route('games.index') }}" class="mb-10 w-2/3">
        <div class="w-full flex">
            <input class="border-2 border-black flex-grow max-w-full mr-3 px-2 py-1" type="text" name="title" placeholder="Search by title" value="{{ request('title') }}" />
            <button class="text-lg hover:underline hover:font-semibold" type="submit">Search</button>
        </div>
    </form>

    <ul>
        @forelse ($games as $game)
            <li>
                <a class="w-full my-3 border-2 border-black px-3 py-2 flex hover:scale-110 hover:shadow transition-all" href="{{ route('games.show', ['game' => $game]) }}">
                    <div class="w-1/5 h-32 bg-gray-100 mr-6 flex-shrink-0">
                    </div>
                    <div class="flex-grow pr-3">
                        <p class="text-lg font-semibold">{{ $game->title }}</p>
                        <p class="text-sm">Published by <span class="italic">{{ $game->publisher }}</span></p>
                    </div>
                    <div class="w-1/4 h-100 ml-auto -my-2 -mx-3 border-l-2 border-black px-2 py-3 flex-shrink-0 flex flex-col justify-center items-center">
                        <p class="text-4xl font-black">
                            @for($i = 0; $i < $game->reviews_avg_rating; $i++)
                                *
                            @endfor
                        </p>
                        <p class="text-sm">out of {{ $game->reviews_count }} {{ Str::plural('review', $game->review_count) }}</p>
                    </div>
                </a>
            </li>
        @empty
            <div class="text-center py-44">
                <p class="text-3xl mb-4">:/</p>
                <p class="text-sm">Seems like all these games went on a quest and never returned..</p>
            </div>
        @endforelse
    </ul>
@endsection
