<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


// Users Management  All Route  
Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'ViewUser'])->name('user.view');

    Route::get('/add', [UserController::class, 'ViewAdd'])->name('users.add');

    Route::post('/store', [UserController::class, 'AddUser'])->name('user.store');

    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');  

    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});

//User Profile and Chenge Password  

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ViewProfile'])->name('profile.view');

    Route::get('/setting', [ProfileController::class, 'ProfileSetting'])->name('profile.setting');

    Route::post('/profile', [ProfileController::class, 'ProfileUpdate'])->name('profile.update');

    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    
    // Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');  

    // Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});