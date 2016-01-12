@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $cocktail->name }}</h1>
        
        <h2>Ingredients</h2>

        <ul>
            @foreach ($cocktail->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
            @endforeach
        </ul>

        <h2>Method</h2>

        <div>
            {{ $cocktail->method }}
        </div>

        <a href="{{ action('CocktailController@edit', ['slug' => $cocktail->slug]) }}">Edit</a>
    </div>
@endsection