<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationsController;
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

    Route::get('/dashboard', [UserController::class, 'userIndex'])->name('dashboard');

    Route::get('/contact', [ContactsController::class, 'index'])->name('contacts.index');
    Route::post('/contact', [ContactsController::class, 'store'])->name('contacts.store');
    Route::get('/contact/create', [ContactsController::class, 'create'])->name('contacts.create');
    Route::get('/contact/{contact}/show', [ContactsController::class, 'show'])->name('contacts.show');
    Route::get('/contact/{contact}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');
    Route::post('/contact/{contact}', [ContactsController::class, 'update'])->name('contacts.update');
    Route::get('/contact/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/search', [ContactsController::class, 'search'])->name('contacts.search');
   
    Route::get('/searchTicket', [TicketsController::class, 'ticketSearch'])->name('tickets.ticketSearch');
    Route::get('/ticket/{ticket}/show', [TicketsController::class, 'ticketShow'])->name('tickets.ticketShow');
    Route::get('/ticket/create/{name}', [TicketsController::class, 'ticketCreateUser'])->name('tickets.ticketCreateUser');
    Route::get('/ticket', [TicketsController::class, 'ticketIndex'])->name('tickets.ticketIndex');
    Route::post('/ticket', [TicketsController::class, 'ticketStore'])->name('tickets.ticketStore');
    Route::get('/ticket/create', [TicketsController::class, 'ticketCreate'])->name('tickets.ticketCreate');
    Route::get('/ticket/{ticket}/close', [TicketsController::class, 'ticketClose'])->name('tickets.ticketClose');
    Route::get('/ticket/{ticket}/open', [TicketsController::class, 'ticketOpen'])->name('tickets.ticketOpen');
    Route::get('/ticket/{ticket}', [TicketsController::class, 'ticketDestroy'])->name('tickets.ticketDestroy');

    Route::get('/notifications', [NotificationsController::class, 'notificationIndex'])->name('notifications.notificationIndex');
    Route::get('/notifications/mark', [NotificationsController::class, 'notificationMark'])->name('notifications.notificationMark');

    
});


require __DIR__.'/auth.php';
