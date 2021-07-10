<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;

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
   
});

//SETUP MANAGEMENT ROUTE 

Route::prefix('setups')->group(function(){

    // ************ STUDENT CLASS ROUTE **************

    Route::get('student/class/view', [StudentClassController::class, 'ViewStudentClass'])->name('student.class.view');

    Route::get('student/class/add', [StudentClassController::class, 'AddStudentClass'])->name('student.class.add');

    Route::post('student/class/store', [StudentClassController::class, 'StoreStudentClass'])->name('student.class.store');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('student.class.edit');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('student.class.update');
    
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

                        
    // ************ STUDENT YEAR ROUTE ************** 
   

    Route::get('student/year/view', [StudentYearController::class, 'ViewStudentYear'])->name('student.year.view');

    Route::get('student/year/add', [StudentYearController::class, 'AddStudentYear'])->name('student.year.add');

    Route::post('student/year/store', [StudentYearController::class, 'StoreStudentYear'])->name('student.year.store');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('student.year.edit');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('student.year.update');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');


     // ************ STUDENT GROUP ROUTE ************** 
   

     Route::get('student/group/view', [StudentGroupController::class, 'ViewStudentGroup'])->name('student.group.view');

     Route::get('student/group/add', [StudentGroupController::class, 'AddStudentGroup'])->name('student.group.add');
 
     Route::post('student/group/store', [StudentGroupController::class, 'StoreStudentGroup'])->name('student.group.store');
 
     Route::get('student/group/edit/{id}', [StudentGroupController::class, 'EditStudentGroup'])->name('student.group.edit');
 
     Route::post('student/group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('student.group.update');
 
     Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');


         // ************ STUDENT SHIFT ROUTE ************** 
   

         Route::get('student/shift/view', [StudentShiftController::class, 'ViewStudentShift'])->name('student.shift.view');

         Route::get('student/shift/add', [StudentShiftController::class, 'AddStudentShift'])->name('student.shift.add');
     
         Route::post('student/shift/store', [StudentShiftController::class, 'StoreStudentShift'])->name('student.shift.store');
     
         Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'EditStudentShift'])->name('student.shift.edit');
     
         Route::post('student/shift/update/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('student.shift.update');
     
         Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
         

            
        // ************  FEE CATEGORY ROUTE ************** 
        

        Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');

        Route::get('fee/category/add', [FeeCategoryController::class, 'AddFeeCat'])->name('fee.category.add');
     
        Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCat'])->name('fee.category.store');
    
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFeeCat'])->name('fee.category.edit');
    
        Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCat'])->name('fee.category.update');
    
        Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCatDelete'])->name('fee.category.delete');

});