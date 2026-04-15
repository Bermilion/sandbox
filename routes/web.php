<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/pages/{view}', function ($view) {
    return view("pages.{$view}");
})->where('view', '.*');
