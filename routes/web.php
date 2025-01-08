<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [IndexController::class, 'posts'])->name('list-news');

Route::get('/post-delete/{id}', [IndexController::class, 'post_delete'])->name('delete');

Route::post('/request-form', [IndexController::class, 'request_form']);

Route::get('/news', [IndexController::class, 'news']);
Route::get('/news-card/{id}', [IndexController::class, 'news_card']);


//HW интернет магазин
Route::get('/loginPage', [ShopController::class, 'loginPage'])->name('login-page');
Route::post('/toLogin', [ShopController::class, 'toLogin'])->name('to-login');
Route::get('/toLogout', [ShopController::class, 'toLogout']); //почему то не работает методом post  --- только GET иначе ошибка  --- оставил GET


Route::get('/products', [ShopController::class, 'products'])->name('products_user');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart_user');

Route::get('/addToCart', [ShopController::class, 'addToCart']);
Route::get('/changeQuantity', [ShopController::class, 'changeQuantity']); // по идее лучше на стороне клиента меняь кол-во шт в корзине