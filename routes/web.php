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
    // User
    Route::resource('userinfo', App\Http\Controllers\UserInformationController::class);

    //Backend
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //Manager Users
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::get('/deleteuser/{id}', [App\Http\Controllers\UsersController::class, 'deleteUser'])->name('deleteuser');
    Route::get('/usersData', [App\Http\Controllers\UsersController::class, 'usersData'])->name('usersData');
    Route::get('/roleandper/{id}', [App\Http\Controllers\UsersController::class, 'roleAndPer'])->name('roleandper');
    Route::post('/updateroleandper/{id}', [App\Http\Controllers\UsersController::class, 'updateRoleAndPer'])->name('updateroleandper');
    //Roles and permission
    Route::resource('rolesandpers', App\Http\Controllers\RolesAndPerController::class);
    Route::get('/rolesData', [App\Http\Controllers\RolesAndPerController::class, 'rolesData'])->name('rolesData');
    Route::get('/persData', [App\Http\Controllers\RolesAndPerController::class, 'persData'])->name('persData');
    Route::get('/addrole', [App\Http\Controllers\RolesAndPerController::class, 'addRole'])->name('addrole');
    // Save permission
    Route::post('/savepermission', [App\Http\Controllers\RolesAndPerController::class, 'savePermission'])->name('savepermission');
    // Save role
    Route::post('/saverole', [App\Http\Controllers\RolesAndPerController::class, 'saveRole'])->name('saverole');
    // Show role
    Route::get('/editrole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'editRole'])->name('editrole');
    // Update role
    Route::post('/updaterole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'updateRole'])->name('updaterole');
    // Delete role
    Route::get('/deleterole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'deleteRole'])->name('deleterole');
    // Show page Permission
    Route::get('/permission', [App\Http\Controllers\RolesAndPerController::class, 'pagePermission'])->name('permission');
    // Delete permission
    Route::get('/deleteper/{id}', [App\Http\Controllers\RolesAndPerController::class, 'deletePer'])->name('deleteper');


});

require __DIR__.'/auth.php';
