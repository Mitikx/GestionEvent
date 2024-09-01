<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\UserAdminController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'admin')->group(function () {
    Route::resource('events', EventAdminController::class);
    Route::get('users', [UserAdminController::class, 'index'])->name('users.index');
});


Route::resource('events', EventController::class);

Route::post('events/{event}/register', [RegistrationController::class, 'store'])->name('registrations.store');
Route::delete('events/{event}/unregister', [RegistrationController::class, 'destroy'])->name('registrations.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
    
