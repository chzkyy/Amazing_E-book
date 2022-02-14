<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageAccountsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
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

//HomePage
Route::get('/', [HomeController::class, 'getIndex'])
    ->name('index');

Route::get('/home', [HomeController::class, 'getHome'])
    ->name('home')
    ->middleware('auth');

// Authentication
Route::get('/login', [AuthController::class, 'getLogin'])
    ->name('get.login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'getRegister'])
    ->name('get.register')
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register')
    ->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

//ProfilePage
Route::get('/profile', [AuthController::class, 'getProfile'])
    ->name('get.profile')
    ->middleware('auth');

Route::get('/profile/update', [AuthController::class, 'update'])
    ->name('update.profile')
    ->middleware('auth');


//Account
Route::get('/account', [ManageAccountsController::class, 'getManage'])
    ->name('get.account')
    ->middleware('auth', 'role:Admin');

Route::get('/account/role/{id}',[ManageAccountsController::class, 'getUpdateRole'])
    ->name('get.update.role')
    ->middleware('auth', 'role:Admin');

Route::post('/account/role/{id}', [ManageAccountsController::class, 'update'])
    ->name('update.role')
    ->middleware('auth', 'role:Admin');

Route::get('/account/delete/{id}', [ManageAccountsController::class, 'deleteAccount'])
    ->name('delete.account')
    ->middleware('auth', 'role:Admin');

//DetailBook
Route::get('/book/{id}', [EBookController::class, 'getBook'])
    ->name('book.detail')
    ->middleware('auth');

//Cart
Route::get('/cart', [OrderController::class, 'getCart'])
    ->name('get.cart')
    ->middleware('auth');

Route::get('/cart/{id}', [OrderController::class, 'rent'])
    ->name('rent.book')
    ->middleware('auth');
    
Route::get('/thankyou', [OrderController::class, 'getThankyou'])
    ->name('order.thx')
    ->middleware('auth');

Route::get('/submit', [OrderController::class, 'submit'])
    ->name('order.submit')
    ->middleware('auth');

Route::get('/delete/{id}', [OrderController::class, 'delete'])
    ->name('order.delete')
    ->middleware('auth');

Route::get('/{id}', [OrderController::class, 'rent'])
    ->name('rent')
    ->middleware('auth');

