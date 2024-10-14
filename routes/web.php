<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[AppController::class,'index'])->name('index');

Route::post('store',[AppController::class,'store'])->name('store');

Route::get('/getData',[AppController::class,'getData'])->name('getData');

Route::post('updateData',[AppController::class,'updateData'])->name('updateData');

Route::get('/deleteData',[AppController::class,'deleteData'])->name('deleteData');

Route::post('uploadfile',[AppController::class,'uploadfile'])->name('uploadfile');
