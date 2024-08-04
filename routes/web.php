<?php

use App\Livewire\Pages\FreepaperList;
use App\Livewire\Pages\HomeWorkshop;
use App\Livewire\Pages\TotalParticipant;
use App\Livewire\Pages\Workshop;
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

Route::get('/', FreepaperList::class);
Route::get('/total-participant', TotalParticipant::class);
Route::get('/workshop', Workshop::class);
Route::get('/home-workshop', HomeWorkshop::class);
