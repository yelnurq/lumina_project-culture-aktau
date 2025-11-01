<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;



// Аутентификация
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name("logout")->middleware('auth');
Route::get('/culture-list', [CultureController::class, 'index'])->name('cultures.index');

// Публичные страницы
Route::get('/', [CultureController::class, 'welcome'])->name('welcome');
Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('/contacts', function() {
     return view("contact");
})->name("contact");
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Админка
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin.index');

// Доступ для moderator и superadmin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/cultures/create', [CultureController::class, 'create'])->name('cultures.create');
    Route::post('/admin/cultures', [CultureController::class, 'store'])->name('cultures.store');

    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');

    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
    
    Route::get('/admin/messages/{id}', [AdminController::class, 'showMessage'])->name('admin.messages.show');

});

// Публичные страницы
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/cultures/{id}', [CultureController::class, 'show'])->name('cultures.show');


// Удаление — только для superadmin
Route::delete('/cultures/{culture}/destroy', [CultureController::class, 'destroy'])->name('cultures.destroy')->middleware(['auth', 'role:superadmin']);
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy')->middleware(['auth', 'role:superadmin']);
