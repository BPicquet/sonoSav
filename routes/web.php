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
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
    Route::get('/tickets/traitement', [TicketController::class, 'stateProcessing'])->name('tickets.processing');
    Route::get('/tickets/envoie', [TicketController::class, 'stateSending'])->name('tickets.sending');
    Route::get('/tickets/reparation', [TicketController::class, 'stateRepairing'])->name('tickets.repairing');
    Route::get('/tickets/disponible', [TicketController::class, 'stateAvalaible'])->name('tickets.avalaible');
    Route::get('/tickets/fini', [TicketController::class, 'stateFinished'])->name('tickets.finished');
    

    Route::get('/tickets/create', [ TicketController::class, 'create' ])->name('tickets.create');
    Route::post('/tickets/store', [ TicketController::class, 'store' ])->name('tickets.store');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('ticket');
    Route::get('/tickets/{id}/edit', [ TicketController::class, 'edit' ])->name('tickets.edit');
    Route::put('/tickets/{id}/update', [ TicketController::class, 'update' ])->name('tickets.update');
    Route::delete('/tickets/{id}/delete', [ TicketController::class, 'delete' ])->middleware('admin')->name('tickets.delete');

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

        ////* Routes User *////
    Route::get('/admin/users', [ MainController::class, 'users'])->middleware('admin')->name('users');    
});

