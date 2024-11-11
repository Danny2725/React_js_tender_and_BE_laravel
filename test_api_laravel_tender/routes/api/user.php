<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\TenderController;

Route::middleware('auth:sanctum')->post('/tenders', [TenderController::class, 'createTender']);




