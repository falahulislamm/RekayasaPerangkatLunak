<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProvidersServicesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('frontend');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Routing Services
Route::get('/services/show', [ServicesController::class, 'show'])->name('services.show');
Route::get('/services/create', [ServicesController::class, 'create'])->name('services.create');
Route::post('/services/store', [ServicesController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');
Route::get('/services/{id}', [ServicesController::class, 'view'])->name('services.view');
Route::get('/services', [ServicesController::class, 'search'])->name('services.search');

// Routing Customer
Route::get('/customer/show', [CustomerController::class, 'show'])->name('customer.show');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/{id}', [CustomerController::class, 'view'])->name('customer.view');
Route::get('/customer', [CustomerController::class, 'search'])->name('customer.search');
Route::get('/customerdata', [CustomerController::class, 'showCustomerData'])->name('customer.showcustomerdata');

// Routing Provider
Route::get('/provider/show', [ProviderController::class, 'show'])->name('provider.show');
Route::get('/provider/create', [ProviderController::class, 'create'])->name('provider.create');
Route::post('/provider/store', [ProviderController::class, 'store'])->name('provider.store');
Route::get('/provider/{id}/edit', [ProviderController::class, 'edit'])->name('provider.edit');
Route::delete('/provider/{id}', [ProviderController::class, 'destroy'])->name('provider.destroy');
Route::get('/provider/{id}', [ProviderController::class, 'view'])->name('provider.view');
Route::get('/provider', [ProviderController::class, 'search'])->name('provider.search');

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
Route::post('/orders/storeprovider', [OrdersController::class, 'storeprovider'])->name('orders.storeprovider');
Route::get('/orders/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/{id}', [OrdersController::class, 'view'])->name('orders.view');
Route::get('/orders', [OrdersController::class, 'search'])->name('orders.search');
Route::get('/customerorder', [OrdersController::class, 'showcustomer'])->middleware('auth')->name('orders.showcustomer');

// Routing Payments
Route::get('/payments/show', [PaymentsController::class, 'show'])->name('payments.show');
Route::get('/payments/create', [PaymentsController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [PaymentsController::class, 'store'])->name('payments.store');
Route::post('/payments/storeprovider', [PaymentsController::class, 'storeprovider'])->name('payments.storeprovider');
Route::get('/payments/{id}/edit', [PaymentsController::class, 'edit'])->name('payments.edit');
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy'])->name('payments.destroy');
Route::get('/payments/{id}', [PaymentsController::class, 'view'])->name('payments.view');
Route::get('/payments', [PaymentsController::class, 'search'])->name('payments.search');

// Routing Reviews
Route::get('/reviews/show', [ReviewsController::class, 'show'])->name('reviews.show');
Route::get('/reviews/create', [ReviewsController::class, 'create'])->name('reviews.create');
Route::post('/reviews/store', [ReviewsController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{id}/edit', [ReviewsController::class, 'edit'])->name('reviews.edit');
Route::delete('/reviews/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');
Route::get('/reviews/{id}', [ReviewsController::class, 'view'])->name('reviews.view');
Route::get('/reviews', [ReviewsController::class, 'search'])->name('reviews.search');
Route::get('/reviews/create/{order_id}', [ReviewsController::class, 'createWithOrder'])->name('reviews.createWithOrder');

// routing Halaman_utama
Route::get('/halaman_utama', [OrdersController::class, 'halaman_utama'])->name('halaman_utama');

// routing Chart
Route::get('/profit-chart', [ChartController::class, 'revenueChart'])->name('profit-chart')->middleware(['auth', 'provider']);

});

require __DIR__.'/auth.php';
