@extends('layouts.default')

@section('content')
    <div class="container cocktail">
        <h1 class="main-title">{{ $cocktail->name }}</h1>
        
        <h2 class="second-title">Ingredients</h2>

        <ul>
            @foreach ($cocktail->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
            @endforeach
        </ul>

        <h2 class="second-title">Glassware</h2>

        <p>Double Rocks</p>

        <h2 class="second-title">Method</h2>

        <div>
            {{ $cocktail->method }}
        </div>

        <a href="{{ action('CocktailController@edit', ['slug' => $cocktail->slug]) }}">Edit</a>
    </div>
@endsection