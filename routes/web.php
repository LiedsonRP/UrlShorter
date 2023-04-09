<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view("/", "shortPage");
Route::view("new-url", "newURLPage");
Route::view("error","message");

Route::post("url-form", [UrlController::class, 'shortURL'])->name("form.short");
Route::get("/{url}", [UrlController::class, 'redirect']);
