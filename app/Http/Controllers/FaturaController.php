<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Fatura;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $faturas = Fatura::with('clientes')  // Relacionamento com os clientes
            ->when($search, function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('total', 'LIKE', "%{$search}%")
                    ->orWhereHas('clientes', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate(10);  // Chama o paginate depois do when

        return view('fatura.index', compact('faturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Fatura $novoId)
    {
        $ultimoId = Fatura::max('id');
        $proximoId = $ultimoId + 1;
        $clientes = Cliente::all();                                                                       //No create das faturas, queremos que apareça em "idCliente" as opções dos clientes para associar, por isso que aqui eu tenho que passar a variável clientes
        return view('fatura.create', compact('clientes', 'proximoId'));                                  //O compact é uma função do PHP que cria um array associativo a partir de variáveis passadas como parâmetros. O nome da variável se torna a chave no array, e o valor da variável se torna o valor dessa chave.
    }                                                                                                   //paginate() é um método da query (busca), assim precisamos em vez de "all" fazer query()

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fatura = new Fatura();      //Instanciar o objeto fatura
        $fatura->data = $request->data;
        $fatura->idCliente = $request->idCliente;
        $fatura->totalLiquido = $request->totalLiquido;
        $fatura->iva = $request->iva;
        $fatura->total = $request->total;

        $fatura->save();
        $novoId = $fatura->id;
        return redirect()->route('faturas.index')->with('alert', "Registo Gravado com Sucesso! ID: $novoId");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fatura $fatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente=Cliente::findorfail($id);
        $fatura=Fatura::findorfail($id);
        return view('fatura.edit', compact('fatura', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fatura=Fatura::findorfail($id);
        $validacao = $request->validate([
            'data' => 'required|date',
            'totalLiquido' => 'required|numeric|min:0',
            'iva' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        $fatura->update($validacao);

        return redirect()->route('faturas.index')->with('alert', 'Registo Gravado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fatura $fatura)
    {
        //
    }
}
