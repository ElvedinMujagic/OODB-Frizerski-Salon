<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Model\Service;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class, 'create']);
Route::put('/services', [ServiceController::class, 'update']);
Route::delete('/services', [ServiceController::class, 'delete']);