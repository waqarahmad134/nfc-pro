<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/waqar', 'App\Http\Controllers\API\UserController@show1')->name('waqar');

Route::get('/user/show', [UserController::class, 'show'])->name('user.show');

Route::get('/user/showbyemail', [UserController::class, 'showbyemail'])->name('user.showbyemail');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('auth:api');
Route::post('/user/storecsv', [UserController::class, 'storecsv'])->name('user.storecsv')->middleware('auth:api');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth:api');
Route::post('/user/update/profile_pic/request', [UserController::class, 'updateProfilePicRequest'])->name('user.update.profile.pic.request');
Route::post('/user/update/profile_pic/confirm', [UserController::class, 'updateProfilePicConfirm'])->name('user.update.profile.pic.confirm');
Route::post('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth:api');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('login/superadmin', [AuthController::class, 'loginSuperadmin'])->name('login.superadmin');
Route::post('login/subadmin', [AuthController::class, 'loginSubadmin'])->name('login.subadmin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:api');

Route::get('/employee-by-subadmin/{name?}', [UserController::class, 'bySubAdmin'])->name('user.bySubAdmin')->middleware('auth:api','throttle:10000,1');
Route::get('/employee-by-subadmin-id/{id}', [UserController::class, 'bySubAdminId'])->name('user.bySubAdminId')->middleware('auth:api','throttle:10000,1');
Route::get('/employee-by-superadmin', [UserController::class, 'bySuperAdmin'])->name('user.bySuperAdmin')->middleware('auth:api');
Route::get('/view-subadmins', [UserController::class, 'viewSubAdmins'])->name('user.viewSubAdmin')->middleware('auth:api');
Route::post('/view-login-history', [UserController::class, 'viewLoginHistory'])->name('user.loginHistory')->middleware('auth:api');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('user.forgotPassword');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('user.changePassword');
Route::post('/change-my-password', [AuthController::class, 'changeMyPassword'])->name('user.changeMyPassword')->middleware('auth:api');
Route::post('/update-email', [AuthController::class, 'updateEmail'])->name('user.updateEmail')->middleware('auth:api');
Route::post('/verify-update-email', [AuthController::class, 'verifyUpdateEmail'])->name('user.verifyUpdateEmail')->middleware('auth:api');
