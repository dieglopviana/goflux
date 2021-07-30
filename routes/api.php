<?php

use App\Http\Controllers\Api\BidController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::name('customer_')->group(function(){
    Route::get('/customers', [CustomerController::class, 'index'])->name('index');
    Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('show');
    Route::post('/customer', [CustomerController::class, 'store'])->name('store');
    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('destroy');
});


Route::name('customer_')->group(function(){
    Route::get('/providers', [ProviderController::class, 'index'])->name('index');
    Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('show');
    Route::post('/provider', [ProviderController::class, 'store'])->name('store');
    Route::put('/provider/{id}', [ProviderController::class, 'update'])->name('update');
    Route::delete('/provider/{id}', [ProviderController::class, 'destroy'])->name('destroy');
});

Route::name('offer_')->group(function(){
    Route::get('/offers', [OfferController::class, 'index'])->name('index');
    Route::get('/offer/{id}', [OfferController::class, 'show'])->name('show');
    Route::post('/offer', [OfferController::class, 'store'])->name('store');
    Route::put('/offer/{id}', [OfferController::class, 'update'])->name('update');
    Route::delete('/offer/{id}', [OfferController::class, 'destroy'])->name('destroy');
});

Route::name('bid_')->group(function(){
    Route::get('/bids', [BidController::class, 'index'])->name('index');
    Route::get('/bid/{id}', [BidController::class, 'show'])->name('show');
    Route::post('/bid', [BidController::class, 'store'])->name('store');
    Route::put('/bid/{id}', [BidController::class, 'update'])->name('update');
    Route::delete('/bid/{id}', [BidController::class, 'destroy'])->name('destroy');
});
