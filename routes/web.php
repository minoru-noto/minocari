<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostItemController;
use App\Http\Controllers\BuyItemController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//google認証ルート
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);

Route::group(['middleware' => ['auth']], function () {
    

    Route::resource('item', ItemController::class);
    
    Route::resource('category', CategoryController::class);
    
    Route::post('category/search', [CategoryController::class,'search'])->name('category.search');

    Route::resource('postItem', PostItemController::class);

    Route::resource('buyItem', BuyItemController::class);


});


