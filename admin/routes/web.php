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


//Clear Cache facade value:
Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/passport', function () {
    $exitCode = Artisan::call('passport:install');
    return '<h1>Cache facade value cleared</h1>';
});

Route::get('add_sub_admin', function () { return view('admin/add_sub_admin');})->name('add_sub_admin');
Route::post('add_sub_admin1', [App\Http\Controllers\UserController::class, 'add_sub_admin'])->name('add_sub_admin1');
Route::get('sub_admin_user_list', [App\Http\Controllers\UserController::class, 'sub_admin_user_list'])->name('sub_admin_user_list');
Route::get('csv', [App\Http\Controllers\UserController::class, 'csv'])->name('csv');


Route::get('otp', [App\Http\Controllers\UserController::class, 'otp'])->name('otp');
Route::post('otppost', [App\Http\Controllers\UserController::class, 'otppost'])->name('otppost');


Route::middleware(['checktoken'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('list-sub-admin', [App\Http\Controllers\UserController::class, 'list_sub_admin'])->name('list_sub_admin');
    Route::get('login_history/{id}', [App\Http\Controllers\UserController::class, 'login_history'])->name('login_history');
    Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::get('edit_subadmin/{id}', [App\Http\Controllers\UserController::class, 'edit_subadmin'])->name('edit_subadmin');
    Route::get('edit-user/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('editUser');
    Route::get('delete_user/{id}', [App\Http\Controllers\UserController::class, 'delete_user_user'])->name('delete_user');
    // Route::get('delete_admin/{id}', [App\Http\Controllers\UserController::class, 'delete_admin'])->name('delete_admin');
    Route::get('block_admin/{id}', [App\Http\Controllers\UserController::class, 'block_admin'])->name('block_admin');
    Route::get('active_admin/{id}', [App\Http\Controllers\UserController::class, 'active_admin'])->name('active_admin');
    
  

    
    
    Route::get('list_users', [App\Http\Controllers\UserController::class, 'list_users'])->name('users');
    Route::get('add_user', function () { return view('admin/add_users');})->name('add_user');
    Route::post('add_users', [App\Http\Controllers\UserController::class, 'add_users'])->name('add_users');
    Route::get('userdetails/{id}', [App\Http\Controllers\UserController::class, 'userdetails'])->name('userdetails');
    

    Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});
Route::get('login', [App\Http\Controllers\UserController::class, 'loginget'])->name('login');
Route::get('change-my-password', [App\Http\Controllers\UserController::class, 'change_my_password'])->name('change-my-password');
Route::post('login', [App\Http\Controllers\UserController::class, 'login'])->name('logins');
Route::get('subadmin-login', [App\Http\Controllers\UserController::class, 'subadminlogin'])->name('subadmin-login');
Route::get('employee-by-subadmin', [App\Http\Controllers\UserController::class, 'employee_by_subadmin'])->name('employee_users');
Route::get('empbysubadminid/{id}', [App\Http\Controllers\UserController::class, 'empbysubadminid'])->name('empbysubadminid');
// Route::post('subadmin-login', [App\Http\Controllers\UserController::class, 'subadmin-login'])->name('subadmin-login');
Route::get('register', function () { return view('auth/register'); })->name('register');
Route::post('register', [App\Http\Controllers\UserController::class, 'register'])->name('registers');

Route::get('error', function () {
    return view('error');
})->name('error');
