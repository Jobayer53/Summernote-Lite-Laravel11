<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummernoteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store',[SummernoteController::class, 'store'])->name('store');
Route::get('/edit/{id}',[SummernoteController::class, 'edit'])->name('edit');
Route::post('/update',[SummernoteController::class, 'update'])->name('update');
