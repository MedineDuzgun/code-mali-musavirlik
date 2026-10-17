<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::get('/kayit', fn () => view('sirket-kayit'))->name('sirket.kayit');

// Şirket (mükellef) kayıt ucu — doğrulama hatasında 422, başarıda 201.
Route::post('/api/sirketler', [CompanyController::class, 'store'])->name('sirketler.store');
