<?php

use App\Http\Controllers\AuthController;
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


Route::get('/',[AuthController::class , "loginpage"]);
Route::get('/register',[AuthController::class , "registerpage"]);

Route::post('/signup',[AuthController::class , "Register"]);
Route::post('/signin',[AuthController::class , "Login"]);
Route::get('/forgot',[AuthController::class , "forgotpage"]);
Route::get('/resetpass',[AuthController::class , "resetpass"]);

