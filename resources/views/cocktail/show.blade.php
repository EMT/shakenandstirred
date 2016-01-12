@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $cocktail->name }}</h1>

        <div>
            {{ $cocktail->method }}
        </div>

        <a href="{{ action('CocktailController@edit', ['slug' => $cocktail->slug]) }}">Edit</a>
    </div>
@endsection