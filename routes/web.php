<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return "Selamat Datang Di BukuAPP";
});

Route::resource('/Buku', BukuController::class);
