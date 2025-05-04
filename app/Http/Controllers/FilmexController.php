<?php

namespace App\Http\Controllers;

use App\Models\Filmex;
use Illuminate\Http\Request;

class FilmexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('filmeX.index');
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
    public function show(Filmex $filmex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filmex $filmex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filmex $filmex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filmex $filmex)
    {
        //
    }
}
