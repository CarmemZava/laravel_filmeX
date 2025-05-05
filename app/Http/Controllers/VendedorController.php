<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Parte do "PESQUISAR"
        $search = $request->input('search');
        $vendedores = Vendedor::query();

        if ($search){
            $vendedores = $vendedores->where('nome', 'LIKE', "%{$search}%");

        }

        //Parte da listagem dos vendedores
        $vendedores = $vendedores->paginate(10); // ou all() se não quiser paginação
        return view('vendedor.index', ['vendedores' => $vendedores]);

            //“envia para a view vendedor.index uma variável chamada $vendedores com o conteúdo da variável $vendedores do controller”
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendedor.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendedor = new Vendedor();
        $validacao = $request->validate([
            'nome'=>'required|string|max:50',
            'morada'=>'required|string|max:50',
            'contato'=>'required|string|max:50',

            ]);

            $vendedor->create($validacao);

            return redirect()->route('vendedor.index')->with('alert', 'Registo Gravado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show($nome)
    {
        $vendedor = Vendedor::where('nome', $nome)->firstOrFail();
        return view('vendedor.show', compact('vendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nome)
    {
        //EDIT será similar ao SHOW, ou seja, mostrar os dados de 1 vendedor, a diferença está no UPDATE
        $vendedor = Vendedor::where('nome', $nome)->firstOrFail();
        return view('vendedor.edit', compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$nome)
    {
         //$validacao é para declarar uma variável validacao, essa variavel vai definir algumas condições de validação para salvar, ex: nome com max 50 caracteres
         //Eu busco o meu vendedor em todos os métodos pelo nome, sendo assim, esse dado não poderá ser alterado.
         $vendedor = Vendedor::where('nome', $nome)->firstOrFail();
         $validacao = $request->validate([
             'morada'=>'required|string|max:50',
             'contato'=>'required|string|max:50',

         ]);

         $vendedor->update($validacao);

         return redirect()->route('vendedor.index')->with('alert', 'Registo Gravado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nome)
    {
        $vendedor=Vendedor::where('nome', $nome)->firstOrFail();
        $vendedor->delete();
        return redirect()->route('vendedor.index');
    }
}
