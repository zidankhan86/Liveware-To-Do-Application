<?php

use App\Livewire\Livewire\FirstComponent;
use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\TestComponent;

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

Route::get('/',FirstComponent::class)->name('landing');

