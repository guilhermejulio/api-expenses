<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Financial\CreateExpenseController;
use App\Http\Controllers\Api\Financial\DeleteExpenseController;
use App\Http\Controllers\Api\Financial\EditExpenseController;
use App\Http\Controllers\Api\Financial\RetrieveExpenseController;
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

Route::middleware(['jwt'])
    ->group(function () {
        Route::prefix('/expenses')
            ->group(function () {
                Route::post('/', [CreateExpenseController::class, 'post']);
                Route::put('/{expense}', [EditExpenseController::class, 'update']);
                Route::delete('/{expense}', [DeleteExpenseController::class, 'delete']);
                Route::get('/', [RetrieveExpenseController::class, 'get']);
            });
    });

Route::prefix('/auth')
    ->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });
