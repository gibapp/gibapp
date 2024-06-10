<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/lost', function () {
    return view('pages.lost');
});

Route::get('/found', function () {
    return view('pages.found');
});
