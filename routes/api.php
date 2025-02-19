<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post("register_admin",[AuthController::class,"register"]);
Route::get("/get_user",[AuthController::class,"getUser"]);
Route::get("/get_detail_user/{id}",[AuthController::class,"getDetailUser"]);
Route::put("/update_user/{id}",[AuthController::class,"update_user"]);
Route::delete("/hapus_user/{id}",[AuthController::class,"hapus_user"]);

Route::post("add_film",[MovieController::class,"addFilm"]);
Route::get("/get_film",[MovieController::class,"getFilm"]);
Route::get("/get_detail_film/{id}",[MovieController::class,"getDetailFilm"]);
Route::post("add_category",[MovieController::class,"addCategory"]);
Route::get("get_category",[MovieController::class,"getCategory"]);
Route::put("/update_film/{id}",[MovieController::class,"update_film"]);
Route::delete("/hapus_film/{id}",[MovieController::class,"hapus_film"]);
Route::put("/update_category/{id}",[MovieController::class,"update_category"]);
Route::delete("/hapus_category/{id}",[MovieController::class,"hapus_category"]);
Route::get("/get_detail_category/{id}",[MovieController::class,"getDetailCategory"]);
Route::post("/login",[AuthController::class,"login"]);
Route::get("/logout",[AuthController::class,"logout"]);

