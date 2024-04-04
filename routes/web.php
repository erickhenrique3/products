<?php

use App\Models\Seller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});




Route::get('/one-to-many', function () {
    $seller = Seller::find(1);

    $seller->products()->create([
        'name' => 'produto new',
        'amount' => 2000,
    ]);
    $seller->refresh();
    dd($seller->products->toArray());
});
