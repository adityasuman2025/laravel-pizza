<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pizzaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pizzas', [pizzaController::class, 'index']);

Route::get('/pizzas/create', [pizzaController::class, 'createForm']);
Route::post('/pizzas/create', [pizzaController::class, 'insert']);

Route::get('/pizzas/{id}', [pizzaController::class, 'getById']);
Route::delete('/pizzas/{id}', [pizzaController::class, 'deleteById']);