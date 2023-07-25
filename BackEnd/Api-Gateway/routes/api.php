<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
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

// Rute untuk meneruskan permintaan register dari klien ke Layanan Autentikasi
Route::post('auth/register', function (Request $request) {
    $response = Http::post('http://127.0.0.1:4000/api/register', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);

    return $response->json();
});

// Rute untuk meneruskan permintaan login dari klien ke Layanan Autentikasi
Route::post('auth/login', function (Request $request) {
    $response = Http::post('http://127.0.0.1:4000/api/login', [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);

    return $response->json();
});

// Rute untuk meneruskan permintaan logout dari klien ke Layanan Autentikasi
Route::post('auth/logout', function (Request $request) {
    $token = $request->bearerToken();
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->post('http://127.0.0.1:4000/api/logout');

    return $response->json();
});