<?php

use App\Http\controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;

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


//1- Do something in the route 
Route::get('/flight.html',function(){
    return view('welcome');
});

Route::get('/hotel.html',function(){
    return view('welcome');
});

Route::get('/car.html',function(){
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello World';
});

//2- Call view in route

Route::get('/welcome', function () {
    return view('welcome');
});

//3- Call Controller Function

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/index.html', [HomeController::class,'index'])->name('home');

//4- Route-> Controller->View

Route::get('/test', [HomeController::class,'test'])->name('test');

//5- Route with parameters
Route::get('/param/{id}/{number}', [HomeController::class,'param'])->name('test');

//6- Route with post 
Route::post('/save', [HomeController::class,'save'])->name('save');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//******* ADMIN PANEL ROUTES *******

Route::get('/admin', [AdminHomeController::class,'index'])->name('admin');

//******* ADMIN TRIP ROUTES *******

Route::get('/admin/trip', [\App\Http\Controllers\AdminPanel\Tripcontroller::class,'index'])->name('admin_trip');

Route::get('/admin/trip/create', [\App\Http\Controllers\AdminPanel\Tripcontroller::class,'create'])->name('admin_trip_create');