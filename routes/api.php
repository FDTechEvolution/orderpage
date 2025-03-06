<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\CODController;
use App\Http\Controllers\Api\LarkController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(CODController::class)->group(function () {
        Route::get('cod/check/{trackingno}/{amount}/{org}', 'check');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/product-by-cat', 'getProductsByCategory')->name('apiProduct.byCategory');
    });

    Route::controller(LarkController::class)->group(function () {
        Route::post('lark', 'index');
        Route::post('lark/callback', 'callBack');
    });
});
