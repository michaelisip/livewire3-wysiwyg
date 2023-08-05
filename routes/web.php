<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipientController;
use App\Livewire\RecipientManager;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('', 'home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/recipients', [RecipientController::class, 'index'])->name('recipients');
Route::get('/', RecipientManager::class);
