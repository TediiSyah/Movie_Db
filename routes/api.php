<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::post("register_admin",[AuthController::class,"register"]);
 Route::get("/get_user",[AuthController::class,"getUser"]);
 Route::get("/get_detail_user/{id}",[AuthController::class,"getDetailUser"]);
 Route::put("/update_user/{id}", [AuthController::class,"update_user"]);
 Route::delete("/hapus_user/{id}", [AuthController::class,"hapus_user"]);


 // Category API
Route::post("/add_category",[MovieController::class,"AddCategory"]);
Route::get("/get_category",[MovieController::class,"getCategory" ]);
Route::get("/get_detail_category/{id}",[MovieController::class,"getDetailCategory"]);
Route::put("/update_category/{id}",[MovieController::class,"update_category"]);
Route::delete("/hapus_category/{id}",[MovieController::class,"hapus_category"]); 


// Movie API
Route::post("/add_movie",[MovieController::class,"AddMovie"]);
Route::get("/get_movie",[MovieController::class,"getMovie" ]);
Route::get("/get_detail_movie/{id}",[MovieController::class,"getDetailMovie"]);
Route::put("/update_movie/{id}",[MovieController::class,"update_movie"]);
Route::delete("/hapus_movie/{id}",[MovieController::class,"hapus_movie"]); 