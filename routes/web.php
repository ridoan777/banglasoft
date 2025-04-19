<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// ------Marquee Control------ 
Route::post('/marquee', [AdminController::class, 'marqueeCreate'])->name('marqueeCreate');
Route::get('/marquee/edit/{id}', [AdminController::class, 'marqueeEdit'])->name('marqueeEdit');
Route::post('/marquee/update/{id}', [AdminController::class, 'marqueeUpdate'])->name('marqueeUpdate');
Route::get('/marquee/delete/{id}', [AdminController::class, 'marqueeDelete'])->name('marqueeDelete');

// ------FAQ Control------ 
Route::post('/faq', [AdminController::class, 'faqCreate'])->name('faqCreate');
Route::get('/faq/edit/{id}', [AdminController::class, 'faqEdit'])->name('faqEdit');
Route::post('/faq/update/{id}', [AdminController::class, 'faqUpdate'])->name('faqUpdate');
Route::get('/faq/delete/{id}', [AdminController::class, 'faqDelete'])->name('faqDelete');
