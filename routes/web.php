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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

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
    Route::get('/contact/{contact}', [ContactsController::class, 'destory'])->name('destory');
    Route::get('/search', [ContactsController::class, 'search'])->name('search');

    
    Route::get('/searchTicket', [TicketsController::class, 'ticket_search'])->name('ticket_search');
    Route::get('/ticket/{ticket}/show', [TicketsController::class, 'ticket_show'])->name('ticket_show');

    Route::get('/ticket/create/{name}', [TicketsController::class, 'ticket_create_user'])->name('ticket_create_user');
    Route::get('/ticket', [TicketsController::class, 'ticket_index'])->name('ticket_index');
    Route::post('/ticket', [TicketsController::class, 'ticket_store'])->name('ticket_store');
    Route::get('/ticket/create', [TicketsController::class, 'ticket_create'])->name('ticket_create');
    Route::get('/ticket/{ticket}/close', [TicketsController::class, 'ticket_close'])->name('ticket_close');
    Route::get('/ticket/{ticket}/open', [TicketsController::class, 'ticket_open'])->name('ticket_open');
    Route::get('/ticket/{ticket}', [TicketsController::class, 'ticket_destory'])->name('ticket_destory');

   
});


require __DIR__.'/auth.php';
