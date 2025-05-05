<?php

namespace App\Http\Controllers;

use App\Models\Aluguer;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class AluguerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alugueres = Aluguer::with('filmes', 'clientes')->get();
        return view('aluguer.index', compact('alugueres'));
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
    public function show(Aluguer $aluguer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluguer $aluguer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluguer $aluguer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluguer $aluguer)
    {
        //
    }
}
