<?php

// use Illuminate\Http\Request;

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

Route::post('/teste', function (Request $request) {
    return $request->input("age");
});

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
