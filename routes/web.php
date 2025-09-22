<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromptController;

Route::get('/', function () {
    return view('home');
});

Route::post('/submit', [PromptController::class, 'submit'])->name('prompt.submit');
