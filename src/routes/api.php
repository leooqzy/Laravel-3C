<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\ItemController;
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

Route::get('/teste', function () {
    return response()->json([
        'message' => 'API funcionando',
    ]);
});

Route::post('/itens',
    [ItemController::class,
        'store']);

Route::put('/itens/{id}',
    [ItemController::class,
        'update']);

Route::get('/itens',
    [ItemController::class,
        'index']);

Route::post('/explorers',
    [ExplorerController::class,
        'store']);

Route::put('/explorers/{explorer}',
    [ExplorerController::class,
        'update']);

Route::get('/explorers',
    [ExplorerController::class,
        'index']);
