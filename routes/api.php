<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\CODController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(CODController::class)->group(function() {
        Route::get('cod/check/{trackingno}/{amount}/{org}', 'check');

    });

});
