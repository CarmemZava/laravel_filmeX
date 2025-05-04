<?php

use App\Http\Controllers\AluguerController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\Filme2Controller;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\FilmexController;
use App\Http\Controllers\MainController2;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendedorController;
use App\Models\Cliente;
use App\Models\Filme;
use App\Models\Filme2;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
    // echo ("Hello World");

});

Route::get('/sobre', function(){          //Definir uma rota , em '' fica o nome da URLe a function() é para chamar o de cima
                                          //Para ver: http://localhost:8000/sobre
    echo('Sobre a minha página;');
});

Route::get('/main/{value}', [MainController2::class,('index')]);                              //Criar rota para o controler criado: MainController2
//  index é a função no MainController2

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Aqui vai acontecer depois da pessoa estar logada, acho que auth é de autenticação
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // //CLIENTE --> Rotas para os clientes
    // Route::get('/clientes', [ClienteController::class,'index'])->name('clientes.index');
    // //CLIETE --> Rota para o botão "Mostrar" aceder a informação
    // Route::get('/clientes_show/{id}',[ClienteController::class,'show'])->name('clientes.show');
    // //CLIENTE --> Rota para o botão "Criar e posteriormente Guardar","Editar" e posteriormente "Atualizar" e "Eliminar"
    // Route::get('/clientes_create',[ClienteController::class,'create'])->name('clientes.create');      //Rota na web + chamar a função controller + nome da rota
    // Route::post('/clientes_store',[ClienteController::class,'store'])->name('clientes.store');        //Aqui foi "post" em vez de "get" no inicio, para associar com o post do  method do formulário
    // Route::get('/clientes_edit/{id}',[ClienteController::class,'edit'])->name('clientes.edit');       //No edit precisa de ser /clientes_edit/{id} porque vai puxar os dados daquele certo id para editarmos
    // Route::put('/clientes_update/{id}',[ClienteController::class,'update'])->name('clientes.update');      //Diferente dos outros, esse Route é put. Precisa também do id para salvar naquele especifico id
    // Route::delete('/clientes_delete/{id}',[ClienteController::class,'destroy'])->name('clientes.destroy');



    // //VENDEDOR --> Rota para LISTAR os vendedores
    // Route::get('/vendedores',[VendedorController::class,'index'])->name('vendedor.index');
    // //VENDEDOR --> Rota para MOSTRAR os vendedores
    // Route::get('/vendedor_show/{nome}',[VendedorController::class,'show'])->name('vendedor.show');
    // //VENDEDOR --> Rota para CRIAR os vedendores
    // Route::get('/vendedor_create',[VendedorController::class,'create'])->name('vendedor.create');
    // //VENDEDOR --> Rota para GUARDAR CRIADOS
    // Route::post('/vendedor_store',[VendedorController::class,'store'])->name('vendedor.store');
    // //VENDEDOR --> Rota para EDITAR os vedendores
    // Route::get('/vendedor_edit/{nome}',[VendedorController::class,'edit'])->name('vendedor.edit');
    // //VENDEDOR --> Rota para GUARDAR EDITADOS
    // Route::put('/vendedor_update/{nome}', [VendedorController::class,'update'])->name('vendedor.update');
    // //VENDEDOR --> Rota para DELETAR os vendedores
    // Route::delete('/vendedor_delete/{nome}',[VendedorController::class,'destroy'])->name('vendedor.destroy');


    //CLIENTE - VENDEDOR --> Rota comum para todas as rotas cliente: posso comentar as rotas singulares criadas e usar apena esta rota
    //A rota encaminha para o Controller onde acontecer todos os métodos
    Route::resources([
        'clientes'=>ClienteController::class,
        'vendedor'=>VendedorController::class,
        'faturas'=>FaturaController::class,
        'filmes'=>FilmeController::class,
        'filmeX'=>FilmexController::class,
        'aluguer'=>AluguerController::class,

    ]);

    Route::get('/exemplo', [ClienteController::class,'exemplo'])->name('clientes.exemplo');    //Para chamar no ClienteController, teremos que criar o método 'exemplo' assim como 'create'

    //Tive que criar rota para index2, a rota geral filmes só inclui os métodos "padrões"
    Route::get('/filmes2', [FilmeController::class, 'index2'])->name('filmes.index2');


});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
