<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/lost', function () {
    return view('pages.lost');
});

Route::get('/admin', function () {
    return view('pages.admin');
});


Route::get('/admin-lost', function () {
    return view('pages.admin-lost');
});

Route::get('/admin-found', function () {
    return view('pages.admin-found');
});


Route::get('/create', [ItemsController::class, 'getCreatePage'])->name('getCreatePage');

Route::get('/get-Item', [ItemsController::class, 'getItem'])->name('getItem');

Route::post('/create-Item', [ItemsController::class, 'createItem'])->name('createItem');

Route::get('/update-Item/{id}', [ItemsController::class, 'getItemById'])->name('getItemById');

Route::patch('/update-Item/{id}', [ItemsController::class, 'updateItem'])->name('updateItem');

Route::delete('/delete-Item/{id}', [ItemsController::class, 'deleteItem'])->name('deleteItem');

Route::post('/create-Item-category', [ItemsController::class, 'createCategory'])->name('createCategory');


