<?php

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

// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    //Backend
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //Users
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::get('/usersData', [App\Http\Controllers\UsersController::class, 'usersData'])->name('usersData');

});

require __DIR__.'/auth.php';
