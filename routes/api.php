<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'v1'], function () {
//     Route::apiResource('customers', 'App\Http\Controllers\CustomerController');
//     Route::apiResource('invoices', 'App\Http\Controllers\InvoiceController');
//     Route::get("/hello", function () {
//         return "Hello World this is mi api rest on laravel 8";
//     });
// });

Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::get("/hello", function () {
        return "Hello World this is mi api rest on laravel 8";
    });
});