<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage.home');
// });

// ------Public Pages------ 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/apply-now', [HomeController::class, 'applynow'])->name('applynow');
Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');


// ------Admin Pages------ 
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

// ------Carousel Control------ 
Route::post('/carousel', [AdminController::class, 'carouselCreate'])->name('carouselCreate');
Route::get('/carousel/edit/{id}', [AdminController::class, 'carouselEdit'])->name('carouselEdit');
Route::post('/carousel/update/{id}', [AdminController::class, 'carouselUpdate'])->name('carouselUpdate');
Route::get('/carousel/delete/{id}', [AdminController::class, 'carouselDelete'])->name('carouselDelete');

// ------Doctor's Form Control------ 
Route::post('/doctor', [AdminController::class, 'doctorCreate'])->name('doctorCreate');
Route::get('/doctor/edit/{id}', [AdminController::class, 'doctorEdit'])->name('doctorEdit');
Route::post('/doctor/update/{id}', [AdminController::class, 'doctorUpdate'])->name('doctorUpdate');
Route::get('/doctor/delete/{id}', [AdminController::class, 'doctorDelete'])->name('doctorDelete');
