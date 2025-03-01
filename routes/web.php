<?php

use App\Http\Controllers\CODController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\ModalCustomerController;
use App\Http\Controllers\ModalOrderController;
use App\Http\Controllers\ModalOrderLineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrackingController;
use App\Jobs\TrackingProcessJob;
use Illuminate\Support\Facades\Route;


Route::controller(GuestController::class)->group(function () {
    Route::get('/guest/find', 'find')->name('guest.find');
});

Route::get('/job/tracking', function () {
    TrackingProcessJob::dispatch();
    return response()->json(['success' => true]);
});



/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
    });

    Route::controller(CODController::class)->group(function () {
        Route::get('/cod', 'index')->name('cod.index');
        Route::get('/cod/upload', 'upload')->name('cod.upload');
        Route::post('/cod/store-upload', 'storeUpload')->name('cod.storeUpload');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::post('/order/changestatus/{order}', 'changeStatus')->name('order.changeStatus');
        Route::get('/order/changestatus/{order}/{status}', 'getChangeStatus')->name('order.getChangeStatus');
    });

    Route::controller(CrmController::class)->group(function () {
        Route::get('/crm', 'index')->name('crm.index');
        Route::get('/crm/customer', 'customer')->name('crm.customer');
        Route::get('/crm/product', 'product')->name('crm.product');
    });

    Route::controller(TrackingController::class)->group(function () {
        Route::get('/tracking', 'index')->name('tracking.index');
    });

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('/manageOrder/new', 'newOrder')->name('manageOrder.new');
        Route::get('/manageOrder/list', 'list')->name('manageOrder.list');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/report/export-order', 'exportOrder')->name('report.exportOrder');
        Route::post('/report/pull-order', 'pullOrder')->name('report.pullOrder');

        Route::get('/report/export-customer', 'exportCustomer')->name('report.exportCustomer');
        Route::post('/report/pull-customer', 'pullCustomer')->name('report.pullCustomer');
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
