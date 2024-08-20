<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/templates/{id}', [TemplateController::class, 'show']);

Route::get('/bc', function () {
    return view('bc');
})->name('bc');


Route::get('/msg', function () {
    return view('msg');
})->name('msg');
