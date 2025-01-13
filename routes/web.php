<?php

use App\Http\Controllers\CODController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\ModalCustomerController;
use App\Http\Controllers\ModalOrderController;
use App\Http\Controllers\ModalOrderLineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::controller(GuestController::class)->group(function () {
    Route::get('/guest/find', 'find')->name('guest.find');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::controller(CODController::class)->group(function () {
        Route::get('/cod', 'index')->name('cod.index');
        Route::get('/cod/upload', 'upload')->name('cod.upload');
        Route::post('/cod/store-upload', 'storeUpload')->name('cod.storeUpload');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::post('/order/changestatus/{order}', 'changeStatus')->name('order.changeStatus');
    });

    Route::controller(CrmController::class)->group(function () {
        Route::get('/crm', 'index')->name('crm.index');
        Route::get('/crm/customer', 'customer')->name('crm.customer');
        Route::get('/crm/product', 'product')->name('crm.product');
    });

    Route::resources([
        'search' => SearchController::class,
        'order' => OrderController::class,
        'modalCustomer' => ModalCustomerController::class,
        'modalOrderLine' => ModalOrderLineController::class,
        'modalOrder' => ModalOrderController::class,
        'manageOrder' => ManageOrderController::class,
        'customer' => CustomerController::class
    ]);
});

require __DIR__ . '/auth.php';
