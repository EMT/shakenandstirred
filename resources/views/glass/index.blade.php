@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Glasses</h1>

        <a href="{{ action('GlassController@create') }}">New Glass</a>

        <ul>
            @foreach ($glasses as $glass)
                <li><a href="{{ action('GlassController@edit', ['slug' => $glass->slug]) }}">{{ $glass->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection