<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    dd('optimized!');
});
Route::get('/key_generate', function () {
    Artisan::call('key:generate');
    dd('key_generate!');
});
Route::get('/passport', function () {
    Artisan::call('passport:install');
    Artisan::call('passport:keys');
    dd('passport_install!');
});
Route::get('/db_seed', function () {
    Artisan::call('db:seed');
    dd('db_seed!');
});
