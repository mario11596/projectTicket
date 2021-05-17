<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TicketsController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/contact', [ContactsController::class, 'index'])->name('index');
    Route::post('/contact', [ContactsController::class, 'store'])->name('store');
    Route::get('/contact/create', [ContactsController::class, 'create'])->name('create');
    Route::get('/contact/{contact}/show', [ContactsController::class, 'show'])->name('show');
    Route::get('/contact/{contact}/edit', [ContactsController::class, 'edit'])->name('edit');
    Route::post('/contact/{contact}', [ContactsController::class, 'update'])->name('update');
    Route::get('/contact/{contact}', [ContactsController::class, 'destroy'])->name('destroy');
    Route::get('/search', [ContactsController::class, 'search'])->name('search');

    
    Route::get('/searchTicket', [TicketsController::class, 'ticketSearch'])->name('ticketSearch');
    Route::get('/ticket/{ticket}/show', [TicketsController::class, 'ticketShow'])->name('ticketShow');
    Route::get('/ticket/create/{name}', [TicketsController::class, 'ticketCreateUser'])->name('ticketCreateUser');
    Route::get('/ticket', [TicketsController::class, 'ticketIndex'])->name('ticketIndex');
    Route::post('/ticket', [TicketsController::class, 'ticketStore'])->name('ticketStore');
    Route::get('/ticket/create', [TicketsController::class, 'ticketCreate'])->name('ticketCreate');
    Route::get('/ticket/{ticket}/close', [TicketsController::class, 'ticketClose'])->name('ticketClose');
    Route::get('/ticket/{ticket}/open', [TicketsController::class, 'ticketOpen'])->name('ticketOpen');
    Route::get('/ticket/{ticket}', [TicketsController::class, 'ticketDestroy'])->name('ticketDestroy');
});


require __DIR__.'/auth.php';
