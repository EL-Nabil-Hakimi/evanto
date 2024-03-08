<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;   
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSessionMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginpage']);
Route::get('/register', [AuthController::class, 'registerpage']);
Route::post('/signup', [AuthController::class, 'Register']);
Route::post('/signin', [AuthController::class, 'Login']);
Route::get('/forgot', [AuthController::class, 'forgotpage']);
Route::get('/resetpass', [AuthController::class, 'forgotpage']);
Route::get('/changepass/{token}', [AuthController::class, 'changepass']);
Route::post('/changepass/{token}', [AuthController::class, 'reset_pass']);
Route::post('/checkemail', [AuthController::class, 'checkemail']);

Route::middleware(['web', CheckSessionMiddleware::class])->group(function () {
    Route::get('/dashboardpage', [UserController::class, 'dashboardpage']);
    Route::get('/userspage', [UserController::class, 'userspage']);
    Route::post('/usersedit', [UserController::class, 'usersedit']);
    Route::get('/usersdelete/{id}', [UserController::class, 'usersdelete']);

    Route::get('/categorypage', [CategoryController::class, 'categorypage']);
    Route::post('/addcategory', [CategoryController::class, 'addcategory']);
    Route::post('/categoryedit', [CategoryController::class, 'categoryedit']);
    Route::get('/categorydelete/{id}', [CategoryController::class, 'categorydelete']);

    Route::get('/eventpage', [EventController::class, 'eventpage']);
    Route::get('/eventpageorg', [EventController::class, 'eventpageorg']);
    Route::get('/ArchivEvent/{id}', [EventController::class, 'ArchivEvent']);
    Route::post('/addevent', [EventController::class, 'addevent']);
    Route::post('/EditEvent', [EventController::class, 'EditEvent']);
    
    
    Route::get("/reservations"  , [ReservationController::class, 'indexOrg']);
    Route::get("/accept/{id}"  , [ReservationController::class, 'accept']);
    Route::get("/reject/{id}"  , [ReservationController::class, 'reject']);
    Route::get("/reservation"  , [ReservationController::class, 'index']);
    Route::post('/create', [ReservationController::class, 'create']);
    
    Route::get('/ArchivEventorg/{id}', [EventController::class, 'ArchivEventOrg']);
    Route::get('/unarchiveorg/{id}', [EventController::class, 'unarchiveorg']);
    
    Route::get("/acceptevent/{id}"  , [EventController::class, 'acceptEvent']);
    Route::get("/rejectevent/{id}"  , [EventController::class, 'rejectEvent']);

});

Route::get('/index', [UserController::class, 'index']);
Route::get('/soloevent', [UserController::class, 'getevent']);
Route::get('/categories/{categoryId}/events/{textsearch}', [CategoryController::class, 'EventsByCategory']);






Route::get('/ticket/{id_event}/{id_user}', [ReservationController::class, 'generateTicket']);


