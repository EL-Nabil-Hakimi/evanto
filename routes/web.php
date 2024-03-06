<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
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

Route::get('/resetpass',[AuthController::class , "forgotpage"]);

Route::get('/changepass/{token}', [AuthController::class, "changepass"]);
Route::post('/changepass/{token}', [AuthController::class, "reset_pass"]);


Route::post('/checkemail',[AuthController::class , "checkemail"]);

Route::get('/dashboardpage' , [UserController::class , "dashboardpage"]);
Route::get('/userspage' , [UserController::class , 'userspage']);
Route::post('/usersedit' , [UserController::class , 'usersedit']);

Route::get('/usersdelete/{id}' , [UserController::class , 'usersdelete']);

Route::get('/categorypage' , [CategoryController::class , "categorypage"]);

Route::post('/addcategory' , [CategoryController::class , "addcategory"]);

Route::post('/categoryedit' , [CategoryController::class , "categoryedit"]);

Route::get('/categorydelete/{id}' , [CategoryController::class , 'categorydelete']);

Route::get('/eventpage' , [EventController::class , "eventpageUser"]);
Route::get('/ArchivEvent/{id}' , [EventController::class , "ArchivEvent"]);
Route::post('/addevent' , [EventController::class , "addevent"]);
Route::post('/EditEvent' , [EventController::class , "EditEvent"]);
