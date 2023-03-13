<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ( string $name) {
    return "Hello, " . $name;
});

Route::get('/news', function () {
    return "News";
});

Route::get('/news/{id}', function ( string $id) {
    return "News" . $id;
});
