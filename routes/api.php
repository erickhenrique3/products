<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('seller', [SellerController::class, 'create']);
//Criar varias rotas com prefixo abaixo >>



Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::post('/', 'create');
    Route::get('/', 'index');
    Route::get('/{product}', 'show');
    Route::put('/{product}', 'update');
    Route::delete('/{product}', 'destroy');
});


// INNER JOIN: Retorna os dados que existem em ambas as tabelas (só retorna quando há correspondência entre products e sellers).
Route::get('/inner', [ProductController::class, 'innerJoin']);

// LEFT JOIN: Retorna todos os dados da tabela à esquerda (products), mesmo que não haja correspondência na tabela da direita (sellers).
Route::get('/left', [ProductController::class, 'leftJoin']);


// RIGHT JOIN: Retorna todos os dados da tabela à direita (sellers), mesmo que não haja correspondência na tabela da esquerda (products).
Route::get('/right', [ProductController::class, 'rightJoin']);
    


// Route::post('/product', [ProductController::class, 'create']);


// all() - retorna todas as informaçoes independete do tipo

// input()- retorna apenas os campos que vierem de input, se passar um parametro com o nome da propriedade, sera acessado p valor dela

//file()  - retorna apenas dados do tipo arquivo

//only() - retorna apenas os que voce passar como parâmentro

//except() - retorna 





// C R U D

// GET   = BUSCAR DADOS
// POST = CRIAR ALGO ENVIADO INFORMAÇOES
// PUT = ATUAÇIZAR ALGO ENVIANDO INFORMAÇOES
// DELETE = DELETE ALGO
