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

Route::get('/form-claim', function() {
    return view('pages.form-claim');
});


Route::get('/create',
           [ItemsController::class, 'getCreatePage']
          )->name('getCreatePage');

Route::get('/get-Item', [ItemsController::class, 'getItem'])->name('getItem');

Route::get('/get-Item-admin', [ItemsController::class, 'getItemAdmin'])->name('getItemAdmin');

Route::post('/create-Item',[ItemsController::class, 'createItem'])->name('createItem');

Route::patch('/claim-item/{id}', [ItemsController::class, 'claimItem'])->name('claimItem');

Route::get('/claim-item/form/{id}', [ItemsController::class, 'getClaimant'])->name('getClaimant');

Route::get('/update-Item/{id}',
           [ItemsController::class, 'getItemById']
          )->name('getItemById');

Route::patch('/update-Item/{id}',
             [ItemsController::class, 'updateItem']
            )->name('updateItem');

Route::delete('/delete-Item/{id}',
              [ItemsController::class, 'deleteItem']
             )->name('deleteItem');

Route::post('/create-Item-category',
            [ItemsController::class, 'createCategory']
           )->name('createCategory');

Route::get('/search', [ItemsController::class, 'searchItem'])->name('searchItem');

