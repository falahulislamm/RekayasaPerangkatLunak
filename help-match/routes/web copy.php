<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProvidersServicesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReviewsController;

Route::get('/', function () {
    return view('welcome');
});

// Routing Services
Route::get('/services/show', [ServicesController::class, 'show'])->name('services.show');
Route::get('/services/create', [ServicesController::class, 'create'])->name('services.create');
Route::post('/services/store', [ServicesController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');
Route::get('/services/{id}', [ServicesController::class, 'view'])->name('services.view');
Route::get('/services', [ServicesController::class, 'search'])->name('services.search');

// Routing Customer
Route::get('/customer/show', [customerController::class, 'show'])->name('customer.show');
Route::get('/customer/create', [customerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [customerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [customerController::class, 'edit'])->name('customer.edit');
Route::delete('/customer/{id}', [customerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/{id}', [customerController::class, 'view'])->name('customer.view');
Route::get('/customer', [customerController::class, 'search'])->name('customer.search');

// Routing Provider
Route::get('/provider/show', [providerController::class, 'show'])->name('provider.show');
Route::get('/provider/create', [providerController::class, 'create'])->name('provider.create');
Route::post('/provider/store', [providerController::class, 'store'])->name('provider.store');
Route::get('/provider/{id}/edit', [providerController::class, 'edit'])->name('provider.edit');
Route::delete('/provider/{id}', [providerController::class, 'destroy'])->name('provider.destroy');
Route::get('/provider/{id}', [providerController::class, 'view'])->name('provider.view');
Route::get('/provider', [providerController::class, 'search'])->name('provider.search');

// Routing Provider Service
Route::get('/providers_services/show', [ProvidersServicesController::class, 'show'])->name('providers_services.show');
Route::get('/providers_services/create', [ProvidersServicesController::class, 'create'])->name('providers_services.create');
Route::post('/providers_services/store', [ProvidersServicesController::class, 'store'])->name('providers_services.store');
Route::get('/providers_services/{id}/edit', [ProvidersServicesController::class, 'edit'])->name('providers_services.edit');
Route::delete('/providers_services/{id}', [ProvidersServicesController::class, 'destroy'])->name('providers_services.destroy');
Route::get('/providers_services/{id}', [ProvidersServicesController::class, 'view'])->name('providers_services.view');
Route::get('/providers_services', [ProvidersServicesController::class, 'search'])->name('providers_services.search');

// Routing Orders
Route::get('/orders/show', [OrdersController::class, 'show'])->name('orders.show');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/{id}', [OrdersController::class, 'view'])->name('orders.view');
Route::get('/orders', [OrdersController::class, 'search'])->name('orders.search');

// Routing Payments
Route::get('/payments/show', [paymentsController::class, 'show'])->name('payments.show');
Route::get('/payments/create', [paymentsController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [paymentsController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}/edit', [paymentsController::class, 'edit'])->name('payments.edit');
Route::delete('/payments/{id}', [paymentsController::class, 'destroy'])->name('payments.destroy');
Route::get('/payments/{id}', [paymentsController::class, 'view'])->name('payments.view');
Route::get('/payments', [paymentsController::class, 'search'])->name('payments.search');

// Routing Reviews
Route::get('/reviews/show', [reviewsController::class, 'show'])->name('reviews.show');
Route::get('/reviews/create', [reviewsController::class, 'create'])->name('reviews.create');
Route::post('/reviews/store', [reviewsController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{id}/edit', [reviewsController::class, 'edit'])->name('reviews.edit');
Route::delete('/reviews/{id}', [reviewsController::class, 'destroy'])->name('reviews.destroy');
Route::get('/reviews/{id}', [reviewsController::class, 'view'])->name('reviews.view');
Route::get('/reviews', [reviewsController::class, 'search'])->name('reviews.search');

// routing Halaman_utama
Route::get('/halaman_utama', [OrdersController::class, 'halaman_utama'])->name('halaman_utama');