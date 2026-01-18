<?php

use App\Livewire\Items\ListCustomers;
use App\Livewire\Items\CreateCustomer;
use App\Livewire\Items\EditCustomer;



use App\Livewire\Items\ListInventories;
use App\Livewire\Items\CreateInventory;
use App\Livewire\Items\EditInventory;

use App\Livewire\Items\ListItems;
use App\Livewire\Items\CreateItem;
use App\Livewire\Items\EditItem;

use App\Livewire\Mangment\ListPaymentMethods;
use App\Livewire\Mangment\ListUsers;
use App\Livewire\Sales\ListSales;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';

Route::middleware(['auth'])->group(function () {
    // users
    Route::get('/manage-users', ListUsers::class)->name('users.index');

    //    //inventory
    Route::get('/manage-items', ListItems::class)->name('items.index');
    Route::get('/create-item', CreateItem::class)->name('item.create');
    Route::get('/edit-item/{id}', EditItem::class)->name('item.edit');

    Route::get('/manage-inventories', ListInventories::class)->name('inventories.index');
    Route::get('/create-inventory', CreateInventory::class)->name('inventories.create');
    Route::get('/edit-inventory/{id}', EditInventory::class)->name('inventories.edit');

    //    // sales
    Route::get('/manage-sales', ListSales::class)->name('sales.index');
    //    // customers
    Route::get('/manage-customers', ListCustomers::class)->name('customers.index');
    Route::get('/create-customer', CreateCustomer::class)->name('customers.create');
    Route::get('/edit-customer/{id}', EditCustomer::class)->name('customers.edit');
    //
    //    // payment method
    Route::get('/manage-payment-methods', ListPaymentMethods::class)->name('payment.method.index');
    //    Route::get('/create-payment-method', CreatePaymentMethod::class)->name('payment-method.create');
});
