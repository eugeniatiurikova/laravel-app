<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\SourceController as AdminSourceController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\Account\IndexController as AccountController;


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

Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)->name('account');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function (): void {
    Route::get('/', IndexController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/edit', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/sources', AdminSourceController::class);
    Route::resource('/users', AdminUsersController::class);
});
});

Route::get('/news', [CategoriesController::class, 'index'])->name('news');
Route::get('/news/all', [NewsController::class, 'index'])->name('all');
Route::get('/news/{catId}', [CategoriesController::class, 'category'])
    ->where('catId','\d+')
    ->name('category');
Route::get('/news/{catId}/{id}', [NewsController::class, 'show'])
    ->where('id','\d+')
    ->where('catId','\d+')
    ->name('show');

//Route::get('/sessions', function () {
//    $name = 'example';
//    if(session()->has($name)) {
//        dd(session()->all());
//        session()->remove($name);
//    };
//    session()->get($name);
//    session()->put($name, 'Test example');
//});

//Route::get('/collections', function () {
//    $names = ['John','Ann','Peter','Lilly','Janice','Victor',];
//    $collection = collect($names);
//    dd($collection);
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
