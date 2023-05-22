<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/',[CustomerController::class,'CustomerView'])->name('customers.view');


Route::prefix('customers')->group(function(){
    Route::get('/view',[CustomerController::class,'CustomerView'])->name('customers.view');

    Route::get('/add',[CustomerController::class,'CustomerAdd'])->name('customers.add');

    Route::post('/store',[CustomerController::class,'CustomerStore'])->name('customers.store');

    Route::get('/edit/{id}',[CustomerController::class,'CustomerEdit'])->name('customers.edit');

    Route::post('/update/{id}',[CustomerController::class,'CustomerUpdate'])->name('customers.update');

    Route::get('/delete/{id}',[CustomerController::class,'CustomerDelete'])->name('customers.delete');
});
