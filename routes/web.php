<?php

use App\Http\Controllers\ContactsController;
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
    Route::get('/contact/{contact}', [ContactsController::class, 'show'])->name('show');
    Route::get('/contact/{contact}/edit', [ContactsController::class, 'edit'])->name('edit');
    Route::post('/contact/{contact}', [ContactsController::class, 'update'])->name('update');
    Route::get('/contact/{contact}', [ContactsController::class, 'destory'])->name('destory');
});


require __DIR__.'/auth.php';
