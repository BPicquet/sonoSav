<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');

Auth::routes();

Route::middleware('auth.custom')->group(function () {
        ////* Routes Tickets *////
    Route::get('/tickets', [MainController::class, 'index'])->name('tickets');
    Route::get('/tickets/{id}', [MainController::class, 'show'])->name('ticket');
    Route::get('/admin/tickets', [ TicketController::class , 'index' ])->middleware('admin')->name('tickets.index'); /* Routes Tickets Admin */
    Route::get('/admin/tickets/create', [ TicketController::class , 'create' ])->name('tickets.create');
    Route::post('/admin/tickets/store', [ TicketController::class , 'store' ])->name('tickets.store');

            /* PDF Route */
    Route::get('/tickets/{id}/pdf', [MainController::class, 'createPDF'])->name('tickets.pdf');


        ////* Routes Customers *////
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->middleware('admin')->name('customers.edit');
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->middleware('admin')->name('customers.update');
    Route::delete('/customers/{id}/delete', [CustomerController::class, 'delete'])->middleware('admin')->name('customers.delete');
});

