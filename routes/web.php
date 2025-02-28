<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('report', App\Livewire\TestReportView::class)
    ->middleware(['auth'])
    ->name('report');

Route::get('tomselect', App\Livewire\TomSelectCheck::class)
    ->middleware(['auth'])
    ->name('tomselect');

require __DIR__ . '/auth.php';