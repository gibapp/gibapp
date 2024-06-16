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


Route::get('/admin/create-item',
           [ItemsController::class, 'getCreatePage']
          )->name('getCreatePage');

Route::get('/admin/get-item',
           [ItemsController::class, 'getItem']
          )->name('getItem');

Route::get('/user/get-item',
           [ItemsController::class, 'getItemForUser']
          )->name('getItemForUser');

Route::post('/admin/post-item',
            [ItemsController::class, 'createItem']
           )->name('createItem');

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


