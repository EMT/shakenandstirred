<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cocktail;
use App\Glass;

use Redirect;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktails = Cocktail::all();
        return view('cocktail.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $glasses = Glass::all();
        return view('cocktail.create', compact('glasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cocktail = new Cocktail();
        $cocktail->name = $request->input('name');
        $cocktail->method = $request->input('method');
        $cocktail->save();

        return Redirect::route('cocktail.index')->with('message', 'Cocktail created');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cocktail = Cocktail::findBySlugOrIdOrFail($slug);
        return view('cocktail.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $cocktail = Cocktail::findBySlugOrIdOrFail($slug);
        return view('cocktail.edit', compact('cocktail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $cocktail = Cocktail::findBySlugOrIdOrFail($slug);
        $cocktail->name = $request->input('name');
        $cocktail->method = $request->input('method');
        $cocktail->save();

        return Redirect::route('cocktail.index')->with('message', 'Cocktail updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
