<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 




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

Route::get('/inventory', [UserController::class, 'getInventory']);
Route::get('/product', [UserController::class, 'getProduct']);
Route::get('/damages', [UserController::class, 'getInventoryDamages']);
Route::get('/category', [UserController::class, 'getInventorywithCategory']);

