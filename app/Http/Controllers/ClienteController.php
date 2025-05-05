<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\search;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Parte do search --> PESQUISAR
        Log::info('fez um index');

        $search = $request->input('search');
        $clientes = Cliente::query();

        if ($search){
            $clientes = $clientes->where('nome', 'LIKE', "%{$search}%")
                                 ->orWhere('email', 'LIKE', "%{$search}%");
        }

        //Parte da listagem dos clientes
        $clientes = $clientes->paginate(10);                                                                      //Para aparecer apenas 10 clientes por página, alterar tb no index.blade
        return view('clientes.index',compact('clientes'));

        // echo('cheguei aqui');
        // dd('cheguei aqui');              //Fica em ecrã preto //debug para ver se passou por aqui
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // echo("criar cliente");
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)           //Request quer dizer que vem de um formulário
    {
        //
        $cliente = new Cliente();                     //Criamos a variável cliente para adicionar um novo cliente, agora o dado da variável nome que vem do formulário será gravado no campo "nome" na tabela clientes
        $cliente -> nome=$request->nome;
        $cliente -> morada=$request->morada;
        $cliente -> telefone=$request->telefone;
        $cliente -> email=$request->email;
        $cliente -> data_nascimento=$request->data_nascimento;

        $cliente->save();

        // return redirect()->back()->with('alert','Registo Gravado com Sucesso');                 //Voltar a página inicial "return redirect()->back()" e o alert para mostrar mensagem
        return redirect()->route('clientes.index')->with('alert', 'Registo Gravado com Sucesso');  //Tive que colocar o laraval sweet alert no index.blade

        // echo("GUARDAR");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // echo("Vou mostrar o cliente {$id} ");
        $cliente=Cliente::findorfail($id);
        // dd($cliente);
        return view('clientes.show',['cliente'=> $cliente]);           //Para mostrar na view, primeiro temos que criar esta view, copiamos o ficheiro "index.blade.php"e
                                                                       // colamos e renomeamos para "show.blade.php" e neste novo fizemos as alterações para nova view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $cliente=Cliente::findorfail($id);
        return view('clientes.edit',['cliente'=> $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)          //Request é o que vem do formulário
    {
        //$validacao é para declarar uma variável validacao, essa variavel vai definir algumas condições de validação para salvar, ex: nome com max 50 caracteres
        $cliente=Cliente::findorfail($id);
        $validacao = $request->validate([
            'nome'=>'required|string|max:50',
            'morada'=>'required|string|max:50',
            'telefone'=>'required|string|max:50',
            'email'=>'required|email',
            'data_nascimento'=>'required|date',



        ]);

        $cliente->update($validacao);

        return redirect()->route('clientes.index')->with('alert', 'Registo Gravado com Sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

    public function exemplo(){

        return view('clientes.exemplo_template');
    }
}
