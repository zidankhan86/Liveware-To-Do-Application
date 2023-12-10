<?php

use App\Livewire\Dashboard;
use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\TestComponent;
use App\Http\Controllers\TestController;
use App\Livewire\Livewire\FirstComponent;

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

Route::get('/', Dashboard::class)->name('dashboard');

// Route::get('/',[TestController::class,'landing'])->name('landing');
