<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/invoice/{uuid}', [InvoiceController::class, 'show']);
Route::post('/invoice/{uuid}/approve', [InvoiceController::class, 'approve']);
Route::post('/invoice/{uuid}/reject', [InvoiceController::class, 'reject']);
