<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use PhpParser\Node\VarLikeIdentifier;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filmes = Filme::query();

        if($search){
            $filmes = $filmes->where('titulo', 'LIKE', "%{$search}%");
        }

        $filmes = $filmes->with('generos')->get();

        return view('filme.index', compact('filmes'));
    }

    public function index2(Request $request)
    {
        $search = $request->input('search');
        $filmes = Filme::query();

        if($search){
            $filmes = $filmes->where('titulo', 'LIKE', "%{$search}%");
        }

        $filmes = $filmes->with('generos')->get();

        return view('filme.index2', compact('filmes'));
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
    public function show(Filme $filme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filme $filme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filme $filme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filme $filme)
    {
        //
    }
}
