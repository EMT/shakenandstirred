@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Cocktail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('CocktailController@update', ['slug' => $cocktail->slug]) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $cocktail->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ingredients') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ingredients (one per line)</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="ingredients">@foreach ($cocktail->ingredients as $ingredient) {{ $ingredient->name . "\n" }}@endforeach</textarea>

                                @if ($errors->has('ingredients'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ingredients') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Method</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="method">{{ $cocktail->method }}</textarea>

                                @if ($errors->has('method'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('method') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('glasses') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Glass(es)</label>

                            <div class="col-md-6">
                                <select class="form-control" name="glasses">
                                    @foreach ($glasses as $glass)
                                        <option value="{{ $glass->id }}">{{ $glass->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('glasses'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('glasses') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Cocktail
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
