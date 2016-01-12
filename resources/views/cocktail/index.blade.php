@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cocktails</h1>

        <a href="{{ action('CocktailController@create') }}">New Cocktail</a>

        <ul>
            @foreach ($cocktails as $cocktail)
                <li><a href="{{ action('CocktailController@show', ['slug' => $cocktail->slug]) }}">{{ $cocktail->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection