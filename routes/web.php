<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function (): void {
    Route::get('/', IndexController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/edit', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{catId}', [NewsController::class, 'category'])
    ->where('catId','\d+')
    ->name('category');
Route::get('/news/{catId}/{id}', [NewsController::class, 'show'])
    ->where('id','\d+')
    ->where('catId','\d+')
    ->name('show');

//Route::get('/collections', function () {
//    $names = ['John','Ann','Peter','Lilly','Janice','Victor',];
//    $collection = collect($names);
//    dd($collection);
//});
