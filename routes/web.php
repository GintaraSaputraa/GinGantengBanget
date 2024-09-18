<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, "Index"]);
Route::get('/checkout/{price}/{item}', [ViewController::class, "Checkout"]);
Route::get('/heroml', [ViewController::class, "HeroML"]);

Route::get('/heroml/check', [ViewController::class, "CheckHeroML"]);