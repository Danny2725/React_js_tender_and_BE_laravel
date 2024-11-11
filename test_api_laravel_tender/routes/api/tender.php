<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenderController;

Route::middleware('auth:sanctum')->post('/', [TenderController::class, 'createTender']);
Route::middleware('auth:sanctum')->get('/', [TenderController::class, 'myTenders']);
Route::middleware('auth:sanctum')->get('/sup', [TenderController::class, 'mySuppliers']);

Route::middleware('auth:sanctum')->delete('/{id}', [TenderController::class, 'destroy']);
Route::middleware('auth:sanctum')->put('/{id}', [TenderController::class, 'update']);
Route::middleware('auth:sanctum')->get('/{id}', [TenderController::class, 'show']);
