<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Food;
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




Route::get("/",[Homecontroller::class,'index'])->name('index');

Route::get("/home",[Homecontroller::class,'index'])->name('index');

Route::get("/redirects",[Homecontroller::class,'redirects'])->name('redirects');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');

Route::get("/users",[AdminController::class,'users'])->name('users');

Route::get("/delete_user/{id}",[AdminController::class,'delete_user'])->name('delete_user');

Route::get("/foodmenu",[AdminController::class,'foodmenu'])->name('foodmenu');

Route::post("/add_foodmenu",[AdminController::class,'add_foodmenu'])->name('add_foodmenu');

Route::get("/delete_menu/{id}",[AdminController::class,'delete_menu'])->name('delete_menu');

Route::get("/update_menu/{id}",[AdminController::class,'update_menu'])->name('update_menu');

Route::post("/update_food/{id}",[AdminController::class,'update_food'])->name('update_food');

Route::post('/reservation',[HomeController::class,'reservation'])->name('reservation');

Route::get('/viewreservation',[AdminController::class,'viewreservation'])->name('viewreservation');

Route::get("/addchefs",[AdminController::class,'addchefs'])->name('addchefs');

Route::post("/uploadchef",[AdminController::class,'uploadchef'])->name('uploadchef');

